<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CSVReader Class
 *
 * Allows to retrieve a CSV file content as a two dimensional array.
 * Optionally, the first text line may contains the column names to
 * be used to retrieve fields values (default).
 */
class CSVReader
{
    var $fields; // columns names retrieved after parsing
    var $separator = ','; // separator used to explode each line
    var $enclosure = '"'; // enclosure used to decorate each field
    var $max_row_size = 4096; // maximum row size to be used for decoding

    /**
     * Parse a file containing CSV formatted data.
     *
     * @access    public
     * @param     string
     * @param     boolean
     * @return    array
     */
    function parse_file($p_Filepath, $p_NamedFields = true)
    {
        $content = [];
        $file = fopen($p_Filepath, 'r');

        if ($file === false) {
            echo json_encode(['state' => FALSE, 'type' => 'error', 'message' => 'Failed to open the file.']);
            return false;
        }

        if ($p_NamedFields) {
            $this->fields = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure);
            if ($this->fields === false) {
                echo json_encode(['state' => FALSE, 'type' => 'error', 'message' => 'Failed to read the header row.']);
                fclose($file);
                return false;
            }
        }

        while (($row = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure)) !== false) {
            if ($row !== null && !empty(array_filter($row))) { // Skip empty lines
                if ($p_NamedFields) {
                    $items = [];
                    foreach ($this->fields as $id => $field) {
                        if (isset($row[$id])) {
                            $items[$field] = $row[$id];
                        }
                    }
                    $content[] = $items;
                } else {
                    $content[] = $row;
                }
            }
        }

        fclose($file);

        if (empty($content)) {
            echo json_encode(['state' => FALSE, 'type' => 'error', 'message' => 'No data found in the file or failed to parse.']);
            return false;
        }

        return $content;
    }
}