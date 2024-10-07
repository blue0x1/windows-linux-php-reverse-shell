# PHP Reverse Shell (Windows/Linux)

This is a simple **PHP reverse shell** that works on both **Windows** and **Linux** systems. It allows you to specify the target operating system via a query parameter, and will execute a PowerShell reverse shell on Windows or a bash reverse shell on Linux.

## How It Works

- **Windows**: Access the script with `?os=windows`, and it will run a **PowerShell** reverse shell on the target machine.
- **Linux**: Access it with `?os=linux`, and it will run a **bash** reverse shell.

## Usage Instructions

### 1. Set Up a Netcat Listener

Before triggering the shell, start a **Netcat listener** on your machine (attacker's machine):

```bash
nc -lvnp 4444
```

### 2. Host the PHP Script

Use PHP’s built-in server to host the reverse shell script:

```bash
php -S 0.0.0.0:8000
```

### 3. Trigger the Reverse Shell

Open a web browser or any HTTP client and visit the PHP script with the appropriate query parameter for the target OS:

- For **Windows**:
  ```plaintext
  http://your-ip:8000/reverse_shell.php?os=windows
  ```

- For **Linux**:
  ```plaintext
  http://your-ip:8000/reverse_shell.php?os=linux
  ```

### 4. Receive the Reverse Shell

Once the reverse shell is triggered, you'll get access to the target machine through your **Netcat listener**.

### Example

```bash
php -S 0.0.0.0:8000
```

Access via browser:
```plaintext
http://your-ip:8000/reverse_shell.php?os=windows
```

## Disclaimer

**Educational Purposes Only**: This script is intended for legal penetration testing or educational use. Unauthorized use of this script is illegal. Please use responsibly in environments where you have explicit permission.
