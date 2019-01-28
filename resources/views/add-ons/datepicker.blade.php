<!-- Date Picker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $( function() {
        $( ".date" ).datepicker({
            firstDay: 1,
            dateFormat: "dd/mm/yy",
            showOtherMonths: true
        }).val();
    } );
</script>  