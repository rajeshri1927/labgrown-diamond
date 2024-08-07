// jQuery AJAX request
$(document).ready(function() {
    var sessiondimanoddata = sessionStorage.getItem("objectdata");
    url = new URL(window.location.href);
    if(sessiondimanoddata && url.searchParams.has('status')){
        var nav = 'nav';
        $.ajax({
            url: 'get-products-quick-filter',
            type: 'POST',
            data: { shape: JSON.parse(sessiondimanoddata)  ,nav:nav},
            dataType:'json',
            success: function(response){
              console.log(response)
            if (response && response.response && response.response.body) {
                const diamondsData = response.response.body.diamonds;
                if (Array.isArray(diamondsData)) {
                    diamondsData.forEach(diamondData => {
                      console.log(diamondData);                    
                        const videoElementId = `video_${diamondData.id}`;
                        const imageElementId = `image_${diamondData.id}`;
                        let decimalNumber    = diamondData.size;
                        let sizeElementId    = decimalNumber.toString().split('.')[0];
                        let afterDot         = decimalNumber.toString().split('.')[1];
                        let caretMarge       = sizeElementId.concat("-", afterDot);
                        let number           = diamondData.total_sales_price * 5;
                        let roundedUpNumber  = Math.ceil(number);
                        // Set the variable
                        // localStorage.setItem( 'objectToPass',diamondData);
                        const diamondHtml    =`
                            <div class="col-md-3"  id="${diamondData.id}">
                              <a href="product-view/${diamondData.id}"  style="text-decoration:none"  >
                                  <div id="${imageElementId}">
                                      <img src="${diamondData.image_url}" class="img-fluid mymultiplediv" id="vvs22">
                                  </div>
                                  <p class="image_description">
                                  <h2 style="font-size: 1.15rem;"> ${decimalNumber} Carat ${diamondData.shape} Lab Diamond </h2>                                    
                                  <p>${diamondData.cut} | ${diamondData.lab} | ${diamondData.clarity} &nbsp;&nbsp;&nbsp; Rs.${roundedUpNumber}.00</p>
                                  <p>Shape: ${diamondData.shape} |  Color: ${diamondData.color} </p>
                                  <p><a href="${diamondData.cert_url}" title="Diamond certificate" class="right" target="_blank"><i class="fa fa-certificate"></i></a> </p>                
                              </a>
                            </div>
                        `;
                        if (diamondHtml) {
                            $('#diamondContainer').append(diamondHtml);
                        } else {
                            $('#diamondContainer').html('No Product Available!!!');
                        }                        
                        
                    });
                }
            } else {
                console.error("Invalid JSON format or missing properties.");
            }
            }
          });
    }else{
        sessionStorage.removeItem("objectdata");
        $.ajax({
            url: 'get-products-api',
            type: 'GET',
            dataType: 'json', 
            success: function(response) {
                if (response && response.response && response.response.body) {
                    const diamondsData = response.response.body.diamonds;
                    if (Array.isArray(diamondsData)) {
                        diamondsData.forEach(diamondData => {
                            const videoElementId = `video_${diamondData.id}`;
                            const imageElementId = `image_${diamondData.id}`;
                            let decimalNumber    = diamondData.size;
                            let sizeElementId    = decimalNumber.toString().split('.')[0];
                            let afterDot         = decimalNumber.toString().split('.')[1];
                            let caretMarge       = sizeElementId.concat("-", afterDot);
                            let number           = diamondData.total_sales_price * 5;
                            let roundedUpNumber  = Math.ceil(number);
                            $('#diamondContainer').append(`
                                <div class="col-md-3"  id="${diamondData.id}">
                                <a href="product-view/${diamondData.id}"  style="text-decoration:none"  >
                                    <div id="${imageElementId}">
                                        <img src="${diamondData.image_url}" class="img-fluid mymultiplediv" id="vvs22">
                                    </div>
                                    <p class="image_description">
                                    <h2 style="font-size: 1.15rem;"> ${decimalNumber} Carat ${diamondData.shape} Lab Diamond </h2>                                    
                                    <p>${diamondData.cut} | ${diamondData.lab} | ${diamondData.clarity} &nbsp;&nbsp;&nbsp; Rs.${roundedUpNumber}.00</p>
                                    <p>Shape: ${diamondData.shape} |  Color: ${diamondData.color} </p>
                                    <p><a href="${diamondData.cert_url}" title="Diamond certificate" class="right" target="_blank"><i class="fa fa-certificate"></i></a> </p>                
                                </a>
                                </div>
                            `);
                        });
                    }
                } else {
                    console.error("Invalid JSON format or missing properties.");
                }
            },
            error: function(error) {
                console.error('Error fetching API data:', error);
            }
        });
    }
    
    // $('#research').click(function(event){
    //     event.preventDefault();
    //     var formdata = {}; // Initialize an empty object to store form data   
    //     // Iterate over each input element with class '.certi' and get its value
    //     $('.certi input[type="text"]').each(function(index, element) {
    //         var name = $(element).attr('name'); // Get the name attribute of the input
    //         var value = $(element).val(); // Get the value of the input
    //         formdata[name] = value; // Add the name-value pair to the formdata object
    //     }); 
    //     $.ajax({
    //         url: 'get-products-advance-filter-data',
    //         type: 'POST',
    //         data: formdata, // Send the formdata object as data
    //         dataType: 'json',
    //         success: function(response){
    //             console.log(response);
    //         }
    //     });
    // });
    
    
    
    // $('#research').click(function(event) { 
    //     // Prevent the default form submission
    //     event.preventDefault();
        
    //     // Initialize an empty object to store selected values
    //     var selectedData = {};
    
    //     // Iterate over each input element in the form
    //     $('#advance_search :input').each(function() {
    //         var element = $(this);
    //         // Check if the element is selected (for checkboxes or select elements)
    //         if (element.is(':checkbox') || element.is('select')) {
    //             // If selected, add its value to the selectedData object
    //             if (element.is(':checked') || element.val()) {
    //                 selectedData[element.attr('name')] = element.val();
    //             }
    //         } else {
    //             // For other input types, add their value to the selectedData object
    //             selectedData[element.attr('name')] = element.val();
    //         }
    //     });
    
    //     // Log the selected data to the console
    //     console.log(selectedData);
    
    //     // Make AJAX request
    //     $.ajax({
    //         url: 'get-products-advance-filter-data',
    //         type: 'POST',
    //         data: selectedData,
    //         dataType: 'json',
    //         success: function(response){
    //             console.log(response)
    //         }
    //     });
    // });    
    
    //     var checkboxes = document.querySelectorAll('.myCheckbox:checked');
    //     var selectedValues = [];
    //      checkboxes.forEach(function(checkbox) {
    //         if (checkbox.checked) {
    //             selectedValues.push(checkbox.value);
    //         }
    //     });
    //     console.log(selectedValues);
    //     // $.ajax({
    //     //     url: 'get-products-filter',
    //     //     type: 'GET',
    //     //     dataType: 'json',
    //     //     success: function(response) {
    //     //         console.log(response.body); 
    //     //         if (response && response.response && response.response.body) {
    //     //             const diamondsData = response.response.body.diamonds;
    //     //             if (Array.isArray(diamondsData)) {
    //     //                 diamondsData.forEach(diamondData => {
    //     //                     const videoElementId = `video_${diamondData.id}`;
    //     //                     const imageElementId = `image_${diamondData.id}`;
    //     //                     let decimalNumber    = diamondData.size;
    //     //                     let sizeElementId    = decimalNumber.toString().split('.')[0];
    //     //                     let afterDot         = decimalNumber.toString().split('.')[1];
    //     //                     let caretMarge       = sizeElementId.concat("-", afterDot);
    //     //                     let number           = diamondData.total_sales_price * 5;
    //     //                     let roundedUpNumber  = Math.ceil(number);
    //     //                     $('#product_filter_container').append(`
    //     //                     <div class="col-md-3"  id="${diamondData.id}">
    //     //                     <a  style="text-decoration:none"  href="product-view/${diamondData.id}">
    //     //                         <div id="${imageElementId}">
    //     //                             <img src="${diamondData.image_url}" class="img-fluid mymultiplediv" id="vvs22">
    //     //                         </div>
    //     //                         <p class="image_description">
    //     //                         <h2 style="font-size: 1.15rem;"> ${decimalNumber} Carat ${diamondData.shape} Lab Diamond </h2>
    //     //                         <p>${diamondData.cut} | ${diamondData.lab} | ${diamondData.clarity} ;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.${roundedUpNumber}.00</p>
    //     //                         <p>Shape: ${diamondData.shape} |  Color: ${diamondData.color}
    //     //                         <a href="${diamondData.cert_url}" title="Diamond certificate" class="pull right" target="_blank"><i class="fa fa-certificate"></i></a> </p>                
    //     //                     </a>
    //     //                     </div>
    //     //                 `);
    //     //                 });
    //     //             }
    //     //         } else {
    //     //             console.error("Invalid JSON format or missing properties.");
    //     //         }
    //     //     },
    //     //     error: function(error) {
    //     //         console.error('Error fetching API data:', error);
    //     //     }
    //     // });
    // });
});