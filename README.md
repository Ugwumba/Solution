# Solution

**Solution** is a comprehensive web application with two main systems:

1. **Login/Registration System:**
   - Users can register and log in securely.
   - Passwords are encrypted for security.
   - A user-friendly interface for easy navigation.

2. **Dashboard System:**
   - The system has separate dashboards for both Admins and Users.

## Admin Dashboard

### Super Admin
- **Client Management:**
  - Super Admin can edit and delete clients.
- **Admin Management:**
  - Access to view all admins (both Super Admin and Sub Admin).
  - Full control to edit, add, and delete admins.

### Sub Admin
- **Client Management:**
  - Sub Admin has the ability to edit clients.
- **Admin Management:**
  - Can view all admins but only has the right to edit.

## Getting Started

1. **Installation:**
   - Clone the repository: `git clone https://github.com/ugwumba/solution.git`
   - Navigate to the project directory: `cd solution`

2. **Setup:**
   - Set up your database and configure the database connection in `config/database.php`.
   - Import the SQL file: `solution.sql` into your database.

3. **Run the Application:**
   - Start your local development server.

4. **Access the Application:**
   - Visit `http://localhost/solution` in your browser.

## Contributing

Feel free to contribute to enhance the functionality or fix issues. Follow these steps:

1. Fork the repository.
2. Create a new branch: `git checkout -b feature/your-feature`.
3. Commit your changes: `git commit -m 'Add some feature'`.
4. Push to the branch: `git push origin feature/your-feature`.
5. Open a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Special thanks to [contributors](CONTRIBUTORS.md) who participated in this project.

Happy coding! 🚀
