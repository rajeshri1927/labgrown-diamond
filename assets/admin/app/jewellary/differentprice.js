(($) => {
	function getProducts() {
        let tableContainer = document.getElementById('table-container');
        if (!tableContainer) {
            console.error('Table container element not found.');
            return;
        }
    
        let endpoint = 'get-jewellay-different-prices';
        let formdata = {};
    
        $.Utility.getData(endpoint, formdata, (response) => {
            try {
                // Check if response is already an object
                let data = (typeof response === 'string') ? JSON.parse(response) : response;
                console.log(data);
    
                let tablesData = data.data;
    
                if (tablesData && tablesData.length) {
                    // Clear existing tables if any
                    let existingTables = tableContainer.querySelectorAll('.row');
                    existingTables.forEach(row => row.remove());
    
                    // Track tables by their names to ensure unique cards
                    let tables = {};
    
                    // Loop through each item and create tables
                    tablesData.forEach(function(item) {
                        if (!tables[item.price_tablename]) {
                            tables[item.price_tablename] = [];
                        }
                        tables[item.price_tablename].push(item);
                    });
    
                    // Initialize row container
                    let rowDiv = document.createElement('div');
                    rowDiv.className = 'row';
    
                    // Iterate over the tables object and generate HTML
                    Object.keys(tables).forEach((tableName, index) => {
                        let cardDiv = document.createElement('div');
                        cardDiv.className = 'col-lg-4 mb-4';
    
                        let cardHtml = `
                            <div class="card">
                                <div class="card-header">
                                    <h5>Sr.No.${index} | TableName: ${tableName}</h5>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-responsive-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>From</th>
                                                <th class="text-center">To</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        `;
    
                        tables[tableName].forEach(item => {
                            cardHtml += `
                                <tr>
                                    <td>${item.diff_pric_id}</td>
                                    <td>${item.PriceStart}</td>
                                    <td class="text-center">${item.PriceEnd}</td>
                                </tr>
                            `;
                        });
    
                        cardHtml += `
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        `;
    
                        cardDiv.innerHTML = cardHtml;
                        rowDiv.appendChild(cardDiv);
    
                        // Add horizontal rule after each card
                        let hr = document.createElement('hr');
                        rowDiv.appendChild(hr);
    
                        if ((index + 1) % 3 === 0) {
                            tableContainer.appendChild(rowDiv);
                            rowDiv = document.createElement('div');
                            rowDiv.className = 'row';
                        }
                    });
    
                    if (rowDiv.hasChildNodes()) {
                        tableContainer.appendChild(rowDiv);
                    }
                } else {
                    console.log('No data available.');
                    let noDataMsg = document.createElement('p');
                    noDataMsg.textContent = 'No data available.';
                    tableContainer.appendChild(noDataMsg);
                }
            } catch (error) {
                console.error('Error parsing or handling response:', error);
                let errorMsg = document.createElement('p');
                errorMsg.textContent = 'Error loading data.';
                tableContainer.appendChild(errorMsg);
            }
        });
    }
    
    document.getElementById('tableSearch').addEventListener('input', function() {
        let searchQuery = this.value.toLowerCase();
        let rows = document.querySelectorAll('#table-container .row');
        let tablesMatched = false;
    
        rows.forEach(row => {
            let cards = row.querySelectorAll('.card');
            let hasVisibleCard = false;
    
            cards.forEach(card => {
                let cardTitle = card.querySelector('.card-header h5').textContent.toLowerCase();
                if (cardTitle.includes(searchQuery)) {
                    card.classList.add('full-width');
                    card.classList.remove('col-lg-4', 'mb-4');
                    card.style.display = '';
                    hasVisibleCard = true;
                    tablesMatched = true;
                } else {
                    card.style.display = 'none';
                }
            });
    
            row.style.display = hasVisibleCard ? '' : 'none';
        });
    
        if (!tablesMatched) {
            let noMatchMsg = document.getElementById('no-match-msg');
            if (!noMatchMsg) {
                noMatchMsg = document.createElement('p');
                noMatchMsg.id = 'no-match-msg';
                noMatchMsg.textContent = 'No tables match the search criteria.';
                tableContainer.appendChild(noMatchMsg);
            }
        } else {
            let noMatchMsg = document.getElementById('no-match-msg');
            if (noMatchMsg) {
                noMatchMsg.remove();
            }
        }
    });

	$('#price_excel').on('click', (e) => {
        e.stopImmediatePropagation();
        e.preventDefault();
    
        let formdata = {
            draw: 1, 
            start: 0,
            length: 10,
            search: {
                value: ''
            }
        };
        var endpoint = 'get-jewellary-priceranges';
        $.ajax({
            url: endpoint,
            type: 'POST',
            data: formdata,
            success: function(response) {
                try {
                    // Check if response is already an object; if not, parse it
                    if (typeof response === 'string') {
                        response = JSON.parse(response);
                    }
    
                    // Check if response contains the expected structure
                    if (response.hasOwnProperty('iTotalRecords') && response.hasOwnProperty('aaData')) {
                        // Ensure aaData is an array
                        if (Array.isArray(response.aaData)) {
                            let data = response.aaData;
                            uploadProductExcel(data);
                        } else {
                            handleErrorResponse('No data available');
                        }
                    } else {
                        handleErrorResponse('Unexpected response structure');
                    }
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                    handleErrorResponse('Error parsing response');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
                handleErrorResponse('AJAX request failed');
            }
        });
    
        function handleErrorResponse(message) {
            $('#select_table').html(`<option value="">${message}</option>`);
        }
    });
    
    

	function uploadProductExcel(tabledata) {
        let endpoint = 'jewellay-upload-differentprice-excel';
        let formData = new FormData();
    
        // Generate dropdown options from tabledata parameter
        let tableOptions = tabledata.map(table => 
            `<option value="${table.pricerange_id}">${table.price_tablename}</option>`
        ).join('');
    
        // Complete dropdown markup with dynamic options
        let tableOptionsHtml = `
            <select id="select_table" class="form-control mt-2">
                <option value="">Select Table</option>
                ${tableOptions}
            </select>
        `;
    
        // Modal content with dynamic dropdown
        var modalContent = `
            <div class="mb-3">
                <label for="select_table">Select Table:</label>
                ${tableOptionsHtml}
            </div>
            <div class="mb-3">
                <label for="differentprice_upload_excel">Upload File:</label>
                <input type="file" id="differentprice_upload_excel" accept=".csv" name="differentprice_upload_excel" class="form-control">
            </div>
        `;
    
        bootbox.confirm({
            title: "Upload Different Table Prices",
            message: modalContent,
            onEscape: false,
            backdrop: 'static',
            centerVertical: true,
            className: "Different-Price-upload-excel-modal",
            buttons: {
                confirm: {
                    label: 'Submit',
                    className: 'btn-square btn-primary'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-square btn-danger'
                }
            },
            callback: function (result) {
                if (result) {
                    // Retrieve the selected table from the dropdown
                    var selectedTable = $('#select_table').val();
                    if (selectedTable) {
                        formData.append('selected_table', selectedTable);
                    }
    
                    // Access the uploaded file using file input ID
                    var uploadedFile = $('#differentprice_upload_excel')[0].files[0];
                    if (uploadedFile) {
                        formData.append('differentprice_upload_excel', uploadedFile);
                    }
    
                    $.Utility.postMultipartData(endpoint, formData, (response) => {
                        alert(response);
                        response = JSON.parse(response);
    
                        if (response.state) {
                            $.Utility.notify(response);
                            // Additional logic after successful upload
                        } else {
                            if (typeof response.message === 'object') {
                                for (var key in response.message) {
                                    $.Utility.notify(response.message[key]);
                                }
                            } else {
                                $.Utility.notify(response.message);
                            }
                        }
                    });
                }
            }
        });
    }
    
    getProducts();
})(jQuery);