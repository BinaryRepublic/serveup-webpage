$(document).ready(function () {
    if(localStorage.openModal == "true") 
    {
        localStorage.openModal = false;
        $(".my-modal").show();
    }

    $(".my-modal-close").click(function() {
        $(".my-modal").hide();
    })
});