$(document).ready(function () {
	function circleListener(circle) {
    circle.addListener('radius_changed', function()
    {
        var $radius = circle.getRadius();
        $('#coverage_area').attr('value', $radius);
        console.log(circle.getRadius());
        console.log(circle.getCenter().lat());
        console.log(circle.getCenter().lng());
    });

    circle.addListener('center_changed', function()
    {
        console.log(circle.getRadius());
        console.log(circle.getCenter().lat());
        console.log(circle.getCenter().lng());
    });
}

});