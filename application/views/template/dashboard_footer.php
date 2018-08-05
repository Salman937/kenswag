<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
<script src='https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js'></script>

<script src="<?php bs() ?>assets/js/script.js"></script>

</body>
</html>

<script>

$("#upload").validate();

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);

$('body').on('click', '.click-hide', function(event) 
{
	event.preventDefault();
	/* Act on the event */
	$('.show-menu').toggle('menu-hide');
});

$('body').on('click', '.hide-menu', function(event) 
{
	event.preventDefault();
	/* Act on the event */
	$('.menu-hide,.navbar-nav').toggle(1000);
});


</script>
