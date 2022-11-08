/* global $ */
(function () {

    $('#modalDelete').on('show.bs.modal', function (event) {
        let element = event.relatedTarget;
        let action = element.getAttribute('data-url');
        //let action = element.dataset.url;
        let id = element.dataset.name;
        let form = document.getElementById('modalDeleteResourceForm');
        form.action = action;
        $('#deletePost').text(id);
    });

})();