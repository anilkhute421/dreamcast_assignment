<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <h1>User Management</h1>
    <div class="container">
        <!-- Form Section -->
        <div class="form-container">
            <form id="userForm" enctype="multipart/form-data">
                @csrf
                <label>Name:</label>
                <input type="text" name="name" id="name" required>
                <span class="error" id="nameError"></span>

                <label>Email:</label>
                <input type="email" name="email" id="email" required >
                <span class="error" id="emailError"></span>

                <label>Phone:</label>
                <input type="text" name="phone" id="phone" required pattern="^[789]\d{9}$" title="Phone number must be 10 digits and start with 7, 8, or 9.">
                <span class="error" id="phoneError"></span>

                <label>Description:</label>
                <textarea name="description" id="description" required></textarea>
                <span class="error" id="descriptionError"></span>

                <label>Role:</label>
                <select name="role_id" id="role_id" required> 
                    <!-- Options will be populated dynamically -->
                </select>
                <span class="error" id="role_idError"></span>

                <label>Profile Image:</label>
                <input type="file" name="profile_image" id="profile_image" required>
                <span class="error" id="profile_imageError"></span>

                <button type="submit">Submit</button>
            </form>
        </div>

        <!-- List Section -->
        <div class="list-container">
            <h2>Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Description</th>
                        <th>Role</th>
                        <th>Profile Image</th>
                    </tr>
                </thead>
                <tbody id="userTable">
                    <!-- User data will be populated dynamically -->
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('javascript/method.js') }}"></script>
</body>
</html>
