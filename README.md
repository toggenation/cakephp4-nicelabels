# Using CakePHP 4 to send Label Data to Nicelabel

Nicelabel has several licensing levels:

* The **Easy** level allows you to use TCP Sockets to send print data to Nicelabel Automation Manager
* With **Enterprise** level you can use Http Client

This repo shows how to send CSV via TCP Socket and XML via HTTP to the NiceLabel Automation Manager

* [https://api.cakephp.org/4.0/class-Cake.Network.Socket.html](https://api.cakephp.org/4.0/class-Cake.Network.Socket.html)
* [https://book.cakephp.org/4/en/core-libraries/httpclient.html](https://book.cakephp.org/4/en/core-libraries/httpclient.html)


Check the Nicelabel directory in the root of this repo for 

* SSCC_Toggen.nlbl - Sample GS1 Label for delivery of Pallets to Australian Supermarkets
* ToggenHTTPServerEnterpriseOnly.misx - HTTP Trigger Configuration for Enterprise License of Nicelabel Automation Manager
* ToggenTCPServerEasy.misx - TCP Port Configuration for Easy License of Nicelabel Automation Manager