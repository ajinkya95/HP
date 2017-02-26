<html>
    <head>
        <!--<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>-->
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script>
            $('#button').click(function() {
    var val1 = $('#text1').val();
    var val2 = $('#text2').val();
    $.ajax({
        type: 'POST',
        url: 'process.php',
        data: { text1: val1, text2: val2 },
        success: function(response) {
            $('#result').html(response);
        }
    });
});
            </script>
    </head>
<body>
    <input type="text" id="text1"> +
    <input type="text" id="text2">
    <button id="button"> = </button>
    <div id="result"></div>
</body>
</html>

