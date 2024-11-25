
        $(document).ready(function () {
            fetchUsers();
            fetchRoles();

            $('#userForm').on('submit', function (e) {
                e.preventDefault();

                  // Clear previous error messages
        $('.error').text('');

        // Get the email input value
        let email = $('#email').val();

        // Regex for email validation
        let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        // Validate the email
        if (!emailRegex.test(email)) {
            $('#emailError').text('Please enter a valid email address');
            return; // Stop form submission if the email is invalid
        }

                let formData = new FormData(this);

                $.ajax({
                    url: '/api/users',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        alert(response.message);
                        $('#userForm')[0].reset();
                        fetchUsers();
                    },
                    error: function (xhr) {
                        $('.error').text('');
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (let key in errors) {
                                $('#' + key + 'Error').text(errors[key][0]);
                            }
                        }
                    }
                });
            });

            function fetchUsers() {
                $.get('/api/users', function (response) {
                    let rows = '';
                    response?.users?.forEach(user => {
                        rows += `
                            <tr>
                                <td>${user?.name}</td>
                                <td>${user?.email}</td>
                                <td>${user?.phone}</td>
                                <td>${user?.description}</td>
                                <td>${user?.role?.name}</td>
                                <td><img src="${user.profile_image}" alt="Image"></td>
                            </tr>
                        `;
                    });
                    $('#userTable').html(rows);
                });
            }

            function fetchRoles() {
                $.get('/api/roles', function (response) {
                    let options = '<option value="">Select Role</option>';
                    response.roles.forEach(role => {
                        options += `<option value="${role.id}">${role.name}</option>`;
                    });
                    $('#role_id').html(options);
                });
            }
        });
