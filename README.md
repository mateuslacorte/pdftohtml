# PDF2HTML

PDF2HTML is a web application that allows you to convert PDF files to HTML format easily. It leverages PHP for server-side processing and pdf2htmlEX for the actual conversion.

## Features

- Convert PDF files to HTML format.
- Secure file upload with validation and virus scanning.
- Simple and intuitive user interface.
- Responsive design for seamless usage on various devices.

## Technologies Used

- PHP
- pdf2htmlEX
- Bootstrap
- ClamAV (optional, for virus scanning)

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/PDF2HTML.git
```

### 2. Install Dependencies

- **pdf2htmlEX**: This tool is required for converting PDF files to HTML format. You can install it on Ubuntu with the following commands:

    ```bash
    sudo apt update
    sudo apt install pdf2htmlex
    ```

    For other Linux distributions, you may need to refer to their respective package managers.

- **PHP**: Ensure PHP is installed on your system. You can install it on Ubuntu with:

    ```bash
    sudo apt install php
    ```

### 3. Set Up Web Server

You need a web server (e.g., Apache, Nginx) to serve the PHP files. If you don't have a web server installed, you can install Apache on Ubuntu with:

```bash
sudo apt install apache2
```

For other distributions, you may need to use their respective package managers.

### 4. Configure ClamAV (Optional)

If you want to enable virus scanning for uploaded files using ClamAV:

- Install ClamAV:

    ```bash
    sudo apt install clamav
    sudo freshclam  # Update virus definitions
    ```

- Configure ClamAV to scan uploaded files. You can integrate ClamAV with PHP by installing `clamav-daemon` and `clamav-freshclam` packages. Ensure that ClamAV is running and configured properly to scan uploaded files for viruses.

### 5. Configure and Run PDF2HTML

- Copy the contents of the cloned repository to your web server's document root directory (e.g., `/var/www/html/`).

- Ensure that the web server has appropriate permissions to read, write, and execute files in the PDF2HTML directory.

- Access the PDF2HTML application through your web browser. You should see the upload form, where you can upload PDF files for conversion to HTML.

### Additional Notes:

- Make sure to secure your web server and PHP environment to prevent unauthorized access and potential security vulnerabilities.
- Regularly update your system and installed packages to maintain security and stability.

With these instructions, you should be able to set up PDF2HTML on your Linux environment and start converting PDF files to HTML format.
