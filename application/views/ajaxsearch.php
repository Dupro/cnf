<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Live Data Search in Codeigniter using Ajax JQuery</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    </head>
    <body>
        <div class="container">
            <br />
            <br />
            <br />

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Search</span>
                    <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
                </div>
            </div>
            <br />
            <div id="result"></div>
        </div>
        <div style="clear:both"></div>
        <br />
        <br />
        <br />
        <br />
    </body>
</html>


<script>
    $(document).ready(function() {

        load_data();

        function load_data(query)
        {
            $.ajax({
                url: "<?php echo base_url(); ?>ajaxsearch/fetch",
                method: "POST",
                data: {query: query},
                success: function(data) {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function() {
            var search = $(this).val();
            if (search !== '')
            {
                load_data(search);
            } else
            {
                load_data();
            }
        });
    });
</script>