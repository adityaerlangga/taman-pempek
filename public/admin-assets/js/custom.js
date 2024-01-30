// hide alert after 2.5 seconds with slow fadeout effect
$(".alert").delay(2500).slideUp(500, function() {
    $(this).alert('close');
});
