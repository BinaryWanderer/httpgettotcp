# README

This is a PHP script that allows you to forward a string of text in an HTTP Request to another device as ASCII over a generic TCP connection.
It includes an IP allowlist feature to restrict access only to specific IP addresses.

## Installation

1. Clone the repository or download the PHP script file to your local machine.
2. Upload the PHP script to your web server or place it in the appropriate directory.
3. Make sure you have PHP installed and configured on your server.

## Configuration

Before using the script, you need to configure the allowlisted IP addresses and the destination device's IP address and port.

1. Open the PHP script file in a text editor.
2. Locate the `$allowlistedIPs` array and replace the example IP addresses with your own allowlisted IP addresses.
3. Find the `$host` variable and replace `'127.0.0.1'` with the IP address or URL of the receiving device.
4. Modify the `$port` variable with the port number of the receiving device.

## Usage

Once you have installed and configured the script, you can use it to forward a string of text to the destination device.
For example requesting it as follows `http://example.com/get_to_tcp.php/ThisStringWillBeSent` would send the string `ThisStringWillBeSent` to the receiving device configured in the php file.

1. Access the PHP script through a web browser or by making an HTTP request to the script's URL.
2. The script will automatically retrieve the requester's IP address and check if it is allowlisted.
3. If the requester's IP address is not in the allowlist, an error message will be displayed.
4. To forward a string, append `your_string` to the script's URL, replacing `your_string` with the desired text, e.g `http://example.com/get_to_tcp.php/ThisStringWillBeSent`.
5. The script will establish a TCP connection to the destination device and send the string over the connection.
6. After sending the string, the connection will be closed.

## Note

- Make sure to properly secure your web server and restrict access to the PHP script file to prevent unauthorized usage.
- This script is a basic example and may require modifications to suit your specific requirements.
- Use caution when allowing external connections and transmitting sensitive data over a TCP connection.

## License

This script is released under the [MIT License](https://opensource.org/licenses/MIT). Feel free to modify and distribute it according to your needs.

## Disclaimer

This script is provided as-is without any warranty or guarantee. The user assumes all responsibility and risk associated with the use of this script. The author and contributors of this script shall not be liable for any damages or losses arising from the use or misuse of this script.

It is the user's responsibility to review and understand the script's functionality and implications. The user should ensure that the script meets their specific requirements and take necessary precautions to protect their systems and data.

Please use this script responsibly and in accordance with applicable laws and regulations.
