<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <script> 
        $(document).ready(function() {

            function load_page(page_number) {
                $.get("inventories/index_html", {page: page_number}, function(res) {
                $('tbody').html(res);
            });
            }
           
            $.get("inventories/pagination", function(res) {
                $(".pagination").html(res);
            
            })
            $(document).on("click", ".page_number", function(e) {
                e.preventDefault();
                let page_number = $(this).text();
                let $selected_option = $("#sort_option").find(":selected");
                let option_name = $selected_option.attr('name'); // Use $selected_option here
                console.log(page_number, option_name);
                load_page(page_number);
            }); 



        // Event handler for select element
        $('select').on('change', function() {
            let selected_option = $(this).find(':selected');
            let option_name = selected_option.attr('name');
            let page_number = $(".page_number");

            $.get("inventories/sort_option", {option: option_name}, function(res) {
                console.log(option_name);
                $('tbody').html(res);
            });
       

            // Update range display based on selected option
            let range = $('.range');
            if (option_name === 'low') {
                range.html('<h3>$min</h3><p>-</p><h3>$max</h3>');
            } else if (option_name === 'high') {
                range.html('<h3>$max</h3><p>-</p><h3>$min</h3>');
            }
        });
        load_page(1);

            

            $('input[name="inventory_name"]').on('input', function() {
                let search_key = $(this).val(); 

                $.get("inventories/search_item", {key: search_key}, function(res) {
                    $('tbody').html(res);
                });
            });
        });
    </script>
</head>
<body>
    <form> 
        <input type="text" name="inventory_name" placeholder="search by name" />
        
        <div class="range"> 
            <h3>$min</h3>
            <p>-</p>
            <h3>$max</h3>
        </div>
        <select id="sort_option"> 
            <option name="low">Low to High Price</option>
            <option name="high">High to Low Price</option>
        </select>
    </form>

    <section> 
        <table> 
            <thead> 
                <td>Item name</td>
                <td>Number of stock</td>
                <td>Price</td>
                <td>Date added</td>
            </thead>

            <tbody> 
            
            </tbody>
        </table>
    </section>
    
    <div class="pagination">

    </div>
</body>
</html>