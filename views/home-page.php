<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Challenge</title>
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <script src="/assets/js/bootstrap.min.js"></script>
</head>

<body>
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
                <div class="col-m-12 mb-5">

                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addClienttModal">Add Client</button>

                </div>
                <div class="col-m-12">
                    <span class="alert alert-warning" id="no-clients-alert">No client(s) found</span>

                    <table class="table table-striped d-none" id="clients-list-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Client code</th>
                                <th style="text-align: center;">No of contacts</th>
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
                <div class="col-m-12 mb-5">

                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addContactModal">Add contact</button>

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
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

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

                        alert(data.message)

                    } else if (xhr.status == 402) {

                        $("#client-name-error").text(data.message);
                        $("#client-name-error").show();

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

                    if (xhr.status == 200) {

                        fetchAllContacts();

                        alert(data.message)

                    } else if (xhr.status == 402) {

                        $("#contact-name-error").text(data.message);
                        $("#contact-name-error").show();

                    }
                });

            return false;
        })


        function fetchAllClients() {
            const route = "<?= url('list.clients') ?>";

            $.get(route, function(data, statusText, xhr) {


                if (xhr.status == 200) {

                    let rows = "";

                    data.forEach(client => {

                        rows += ` <tr>
                                <td>${client.name}</td>
                                <td>${client.client_code}</td>
                                <td style="text-align: center;">${client.contacts_sum}</td>
                            </tr>`;
                    })

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

                    data.forEach(contact => {

                        rows += ` <tr>
                                <td>${contact.name}</td>
                                <td>${contact.surname}</td>
                                <td>${contact.email}</td>
                                <td>${contact.contact_code}</td>
                                <td style="text-align: center;">${contact.clients_sum}</td>
                            </tr>`;
                    })

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
    })()
</script>

</html>