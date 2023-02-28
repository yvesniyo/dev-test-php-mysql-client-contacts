<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Challenge</title>
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <style>
        .nav {
            background: #efefef;
        }

        .nav-item {
            width: 50%;
        }

        .nav-item button {
            width: 100%;
            border-radius: 0px !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-12 mt-4">
                <h4 class="text-center">CODING CHALLENGE</h4>
            </div>

            <div class="col-12 mt-5">

                <section class="head">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-clients-tab" data-bs-toggle="pill" data-bs-target="#pills-clients" type="button" role="tab" aria-controls="pills-clients" aria-selected="true">Clients</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contacts-tab" data-bs-toggle="pill" data-bs-target="#pills-contacts" type="button" role="tab" aria-controls="pills-contacts" aria-selected="false">Contacts</button>
                        </li>
                    </ul>
                </section>

                <div class="tab-content mt-5" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-clients" role="tabpanel" aria-labelledby="pills-clients-tab" tabindex="0">

                        <div class="row">
                            <div class="col-m-12 mb-2 pr-3" style="text-align: right;">

                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#addClientModal">Add Client</button>

                            </div>
                            <div class="col-m-12">
                                <span class="alert alert-warning" id="no-clients-alert">No client(s) found</span>

                                <table class="table table-striped d-none" id="clients-list-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Client code</th>
                                            <th style="text-align: center;">No of contacts</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="pills-contacts" role="tabpanel" aria-labelledby="pills-contacts-tab" tabindex="0">

                        <div class="row">
                            <div class="col-m-12 mb-2 pr-3" style="text-align: right;">

                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#addContactModal">Add contact</button>

                            </div>
                            <div class="col-m-12">
                                <span class="alert alert-warning" id="no-contacts-alert">No contact(s) found</span>

                                <table class="table table-striped d-none" id="contacts-list-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th style="text-align: center;">No of clients</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- Creating new client Modal -->
    <div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addClientModalLabel">Add Client</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="clientCreateForm">
                        <div class="mb-3">
                            <label for="client-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="client-name">
                            <span class="text-danger" id="client-name-error"></span>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


    <!-- Creating new contact Modal -->
    <div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addContactModalLabel">Add Contact</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="contactCreateForm">
                        <div class="mb-3">
                            <label for="contact-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="contact-name">
                            <span class="text-danger" id="contact-name-error"></span>
                        </div>

                        <div class="mb-3">
                            <label for="contact-surname" class="col-form-label">Surname:</label>
                            <input type="text" class="form-control" id="contact-surname">
                            <span class="text-danger" id="contact-surname-error"></span>
                        </div>

                        <div class="mb-3">
                            <label for="contact-email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="contact-email">
                            <span class="text-danger" id="contact-email-error"></span>
                        </div>


                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


    <!-- connect client and contact Modal -->
    <div class="modal fade" id="connectClientContactModal" tabindex="-1" aria-labelledby="connectClientContactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="connectClientContactModalLabel">Connect Client and Contact</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="connectClientContactForm">
                        <div class="mb-3">
                            <label for="select-client" class="col-form-label">client:</label>
                            <select id="client-options" class="form-select" disabled>
                                <option>Select Client</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="select-contact" class="col-form-label">contact:</label>
                            <select id="contact-options" class="form-select" disabled>
                                <option>Select Contact</option>
                            </select>
                        </div>


                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>



    <!-- detach client and contact Modal -->
    <div class="modal fade" id="detachClientContactModal" tabindex="-1" aria-labelledby="detachClientContactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detachClientContactModalLabel">Detach Contacts</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-striped" id="clients-or-contacts-list-table">
                        <thead>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>


                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    (function() {
        const clientCreateForm = $("#clientCreateForm");
        clientCreateForm.on("submit", function(event) {
            event.preventDefault();

            $("#client-name-error").hide();

            if ($("#client-name").val().trim() == "") {

                $("#client-name-error").text("Client name should not be empty");
                $("#client-name-error").show();

                return false;
            }

            const name = $("#client-name").val();
            const route = "<?= url('create.clients') ?>";

            $.post(route, {
                    name: name,
                },
                function(data, statusText, xhr) {

                    if (xhr.status == 200) {

                        fetchAllClients();

                        Swal.fire({
                            icon: 'success',
                            title: 'success',
                            text: data.message
                        })
                        $("#addClientModal").modal("toggle");
                        $("#client-name").val("");


                    } else if (xhr.status == 422) {


                        Swal.fire({
                            icon: 'error',
                            title: 'invalid',
                            text: data.message
                        })

                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'invalid',
                            text: "An error occured while trying to save client"
                        })
                    }
                });

            return false;
        })

        const contactCreateForm = $("#contactCreateForm");
        contactCreateForm.on("submit", function(event) {
            event.preventDefault();

            $("#contact-name-error").hide();
            $("#contact-surname-error").hide();
            $("#contact-email-error").hide();

            var validRegexForEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

            if ($("#contact-name").val().trim() == "") {

                $("#contact-name-error").text("contact name should not be empty");
                $("#contact-name-error").show();
                return false;
            } else if ($("#contact-surname").val().trim() == "") {

                $("#contact-surname-error").text("contact surname should not be empty");
                $("#contact-surname-error").show();
                return false;
            } else if ($("#contact-email").val().trim() == "" || !$("#contact-email").val().trim().match(validRegexForEmail)) {

                $("#contact-email-error").text("contact email should be valid");
                $("#contact-email-error").show();
                return false;
            }



            const name = $("#contact-name").val();
            const surname = $("#contact-surname").val();
            const email = $("#contact-email").val();


            const route = "<?= url('create.contacts') ?>";
            $.post(route, {
                    name,
                    surname,
                    email
                },
                function(data, statusText, xhr) {

                    fetchAllContacts();

                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: data.message
                    })
                    $("#addContactModal").modal("toggle");
                    $("#contact-name").val("");
                    $("#contact-surname").val("");
                    $("#contact-email").val("");


                }).fail((xhr, err) => {

                if (xhr.status >= 400 && xhr.status < 500) {

                    Swal.fire({
                        icon: 'error',
                        title: 'invalid',
                        text: xhr.responseJSON.message
                    })

                } else {

                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: "An error occured while trying to save contact"
                    })
                }
            });

            return false;
        })

        const connectClientContactForm = $("#connectClientContactForm");
        connectClientContactForm.on("submit", function(event) {
            event.preventDefault();

            const client_id = $("#client-options").val();
            const contact_id = $("#contact-options").val();

            const route = "<?= url('connect.client-to-contact') ?>" + `${client_id}/${contact_id}`;
            $.post(route, {},
                function(data, statusText, xhr) {


                    fetchAllContacts();
                    fetchAllClients();

                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: data.message
                    })

                    $("#connectClientContactModal").modal("toggle");

                }).fail((xhr, err) => {

                if (xhr.status >= 400 && xhr.status < 500) {

                    Swal.fire({
                        icon: 'error',
                        title: 'invalid',
                        text: xhr.responseJSON.message
                    })

                } else {

                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: "An error occured while trying to save contact"
                    })
                }
            });

            return false;
        })

    })()

    function fetchAllClients() {
        const route = "<?= url('list.clients') ?>";

        $.get(route, function(data, statusText, xhr) {


            if (xhr.status == 200) {

                let rows = "";

                let selectOptions = "";

                data.forEach(client => {
                    const options = ` <button class='btn btn-sm btn-warning' data-bs-toggle="modal"
                        onclick="attachContact(${client.id})"
                         data-bs-target="#connectClientContactModal">Attach Contact</button> 
                         
                         <button class='btn btn-sm btn-danger' data-bs-toggle="modal"
                        onclick="detachContacts(${client.id})"
                         data-bs-target="#detachClientContactModal">Detach Contact</button>`;
                    rows += ` <tr>
                                <td>${client.name}</td>
                                <td>${client.client_code}</td>
                                <td style="text-align: center;">${client.contacts_sum}</td>
                                <td> ${options} </td>
                            </tr>`;

                    selectOptions += `
                            <option value="${client.id}"> ${client.name} / ${client.client_code}</option>`;
                })

                $("#client-options").html(selectOptions);


                $("#clients-list-table tbody").html(rows);

                if (data.length > 0) {

                    $("#clients-list-table").removeClass("d-none");
                    $("#no-clients-alert").addClass("d-none");
                } else {

                    $("#clients-list-table").addClass("d-none");
                    $("#no-clients-alert").removeClass("d-none");


                }


            }
        });
    }
    fetchAllClients();


    function fetchAllContacts() {
        const route = "<?= url('list.contacts') ?>";

        $.get(route, function(data, statusText, xhr) {


            if (xhr.status == 200) {

                let rows = "";

                let selectOptions = "";

                data.forEach(contact => {

                    const options = ` <button class='btn btn-sm btn-warning' 
                        onclick="attachClient(${contact.id})"
                         data-bs-toggle="modal" data-bs-target="#connectClientContactModal">Attach Client</button>  
                         
                         <button class='btn btn-sm btn-danger' data-bs-toggle="modal"
                        onclick="detachClients(${contact.id})"
                         data-bs-target="#detachClientContactModal">Detach Client</button>`;

                    rows += ` <tr>
                                <td>${contact.name}</td>
                                <td>${contact.surname}</td>
                                <td>${contact.email}</td>
                                <td style="text-align: center;">${contact.clients_sum}</td>
                                <td> ${options} </td>

                            </tr>`;

                    selectOptions += `
                            <option value="${contact.id}"> ${contact.name} / ${contact.surname}</option>`;
                })

                $("#contact-options").html(selectOptions);

                $("#contacts-list-table tbody").html(rows);

                if (data.length > 0) {

                    $("#contacts-list-table").removeClass("d-none");
                    $("#no-contacts-alert").addClass("d-none");
                } else {

                    $("#contacts-list-table").addClass("d-none");
                    $("#no-contacts-alert").removeClass("d-none");


                }


            }
        });
    }
    fetchAllContacts();

    function attachContact(clientId) {

        $("#contact-options").removeAttr("disabled");
        $("#client-options").attr("disabled", "disabled");

        //select the client option with this clientId
        $(`#client-options option[value="${clientId}"]`).attr('selected', 'selected');

    }

    function attachClient(contactId) {
        $("#contact-options").attr("disabled", "disabled");
        $("#client-options").removeAttr("disabled");

        //select the contact option with this contactId
        $(`#contact-options option[value="${contactId}"]`).attr('selected', 'selected');
    }

    function detachClients(contactId) {
        const table = $("#clients-or-contacts-list-table");
        $("#detachClientContactModalLabel").text("Detach clients");

        const route = "<?= url('connected.clients') ?>" + contactId;
        $.get(route, function(data, statusText, xhr) {

            if (xhr.status == 200) {

                let head = `
                    <tr>
                        <th>Name</th>
                        <th>Client Code</th>
                        <th></th>
                    </tr>`;
                let rows = '';
                data.forEach((client) => {

                    rows += ` <tr>
                        <td>${client.name}</td>
                        <td>${client.client_code}</td>
                        <td> <button class="btn btn-xs btn-danger"  onclick="separateContactAndClient(${client.id}, ${contactId})">X</button> </td>
                    </tr>`;
                })


                if (data.length == 0) {

                    rows = `<p class="text-center text-danger">No client(s) found</p>`
                    head = "";
                }


                $("#clients-or-contacts-list-table thead").html(head);
                $("#clients-or-contacts-list-table tbody").html(rows);
            }
        })

    }

    function detachContacts(clientId) {

        const table = $("#clients-or-contacts-list-table");
        $("#detachClientContactModalLabel").text("Detach contacts");

        const route = "<?= url('connected.contacts') ?>" + clientId;
        $.get(route, function(data, statusText, xhr) {

            if (xhr.status == 200) {

                let head = `
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>`;
                let rows = '';
                data.forEach((contact) => {

                    rows += ` <tr>
                                <td>${contact.name}</td>
                                <td>${contact.email}</td>
                                <td> <button class="btn btn-xs btn-danger"  onclick="separateContactAndClient(${clientId}, ${contact.id}, 'detachContacts')"">X</button> </td>

                            </tr>`;
                })


                if (data.length == 0) {

                    rows = `<p class="text-center text-danger">No contact(s) found</p>`
                    head = "";
                }

                $("#clients-or-contacts-list-table thead").html(head);
                $("#clients-or-contacts-list-table tbody").html(rows);
            }
        })

    }

    function separateContactAndClient(clientId, contactId, fnToReload) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                const route = "<?= url('separate.contact-client') ?>";
                $.post(route, {
                    clientId,
                    contactId
                }, function(data, statusText, xhr) {

                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: data.message
                    })

                    fetchAllContacts();
                    fetchAllClients();

                    if (fnToReload == "detachContacts") {

                        detachContacts(clientId);
                    } else {
                        detachClients(contactId);
                    }

                }).fail((xhr, err) => {

                    if (xhr.status >= 400 && xhr.status < 500) {

                        Swal.fire({
                            icon: 'error',
                            title: 'invalid',
                            text: xhr.responseJSON.message
                        })

                    } else {

                        Swal.fire({
                            icon: 'success',
                            title: 'success',
                            text: "An error occured while trying to save contact"
                        })
                    }
                });

            }
        })


    }
</script>

</html>