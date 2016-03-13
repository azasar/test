/**
 * Created by aza on 3/13/2016.
 */

/**
 * Represents an employee.
 *
 * @constructor
 */
function Employee() {
    this.updateLink = '/site/update?id=';
    this.deleteLink = '/site/delete?id=';

    this.createButton = '.js-create-employee';
    this.updateButton = '.js-update-employee';
    this.deleteButton = '.js-delete-employee';

    this.createModal = '#create-employee-modal';
    this.updateModal = '#update-employee-modal';

    this.createForm = '#create-employee-form';
    this.updateForm = '#update-employee-form';

    this.updateWrap = '.js-update-employee-wrap';
    this.row = '.employee-row-';
    this.table = '.js-employees-table';
    this.id = 0;
}

/**
 * Creates an employee.
 *
 * @this   {Employee}
 */
Employee.prototype.create = function() {
    var form = $(this.createForm);
    var link = form.attr('action');
    var data = form.find("select, textarea, input, checkbox").serialize();

    $.post(link, data,
        function(data){
            $(employee.table).append(data);
        }, "html");

    $(this.createModal).modal('hide');
};

/**
 * Updates an employee.
 *
 * @this   {Employee}
 */
Employee.prototype.update = function() {
    var form = $(this.updateForm);
    var link = form.attr('action');
    var data = form.find("select, textarea, input, checkbox").serialize();

    $.post(link, data,
        function(data){
            $(employee.row + employee.id).replaceWith(data);
        }, "html");

    $(this.updateModal).modal('hide');
};

/**
 * Deletes an employee.
 *
 * @param {int} id - Id of an employee.
 * @this   {Employee}
 */
Employee.prototype.delete = function(id) {
    if (confirm("Are you sure")) {
        $.post(this.deleteLink + id, {},
            function(data){
                $(employee.row + id).remove();
            }, "html");
    }
};

/**
 * Shows employee update modal.
 *
 * @param {int} id - Id of an employee.
 * @this   {Employee}
 */
Employee.prototype.showUpdateModal = function(id) {
    $(this.updateModal).modal();
    $.post(this.updateLink + id, {},
        function(data){
            $(employee.updateWrap).html(data);
        }, "html");
};

/**
 * Shows employee create modal.
 *
 * @this   {Employee}
 */
Employee.prototype.showCreateModal = function() {
    $(this.createModal).modal();
};



var employee = new Employee();
var body = $('body');

//  update events
body.on('click', employee.updateButton, function(){
    employee.id = $(this).data('id');
    employee.showUpdateModal(employee.id);
});
body.on('submit', employee.updateForm, function(e){
    e.preventDefault();
    employee.update();
});

//  create events
body.on('click', employee.createButton, function(){
    employee.showCreateModal();
});
body.on('submit', employee.createForm, function(e){
    e.preventDefault();
    employee.create();
});

//  delete events
body.on('click', employee.deleteButton, function(){
    employee.delete($(this).data('id'));
});