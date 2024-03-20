<!-- get.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        /* CSS styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>User Data</h2>
    <table id="userData">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody id="userDataBody">
            <!-- Data will be dynamically populated here -->
        </tbody>
    </table>

    <script>
        // Make an AJAX request to fetch user data from the API endpoint
        fetch('/api/index')
            .then(response => response.json())
            .then(data => {
                // Get the table body element
                const tableBody = document.getElementById('userDataBody');

                // Iterate over the received data and populate the table
                data.forEach(user => {
                    // Create a new row
                    const row = document.createElement('tr');

                    // Populate the row with user data
                    row.innerHTML = `
                        <td>${user.id}</td>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                    `;

                    // Append the row to the table body
                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error fetching user data:', error.message);
            });
    </script>
</body>
</html>
