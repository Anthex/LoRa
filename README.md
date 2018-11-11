# TO52 - LoRa Backend
This web application processes incoming HTTP:POST requests, performs a basic check on the data, stores it in a csv file and displays it in the form of a google chart.

This project is being developped in the context of the TO52 course at [UTBM](http://utbm.fr)

## Screenshot 

![alt text](http://dantz.fr/TO52/screenshot.png  "Application screenshot")


## Features
- User authentication using apache BasicAuth
- User-configurable chart type and colors
- Automatic cookies management for color choice
- Gluten-free

## Todo
- MySQL integration
- Data structure rewrite for more flexibility
- User-friendly functions

## Deployment instructions
- Clone this repo
- Create and edit .htaccess and .htpasswd for BasicAuth usage
- Edit the data structures according to your needs
- Send your POST requests to http://yoursever/restricted/submit.php (See python script in LoRa-Python)

 ## Python request example (2.7)
 Basic script to send POST request with 2 numeric arguments
### usage example:
 ```
 python ./rest.py 42 69
 ```
 ### Code:
 ```python
import urllib2
import urllib
import sys

username='yourusername'
password='yourpassword'

url = 'http://yourserver/restricted/submit.php/'
req = urllib2.Request(url)

values = {'temperature' : sys.argv[1] ,'humidite' : sys.argv[2]}
data = urllib.urlencode(values)
req.add_data(data)

#authentication
password_manager = urllib2.HTTPPasswordMgrWithDefaultRealm()
password_manager.add_password(None, url, username, password)
auth_manager = urllib2.HTTPBasicAuthHandler(password_manager)
opener = urllib2.build_opener(auth_manager)
urllib2.install_opener(opener)

#send request
code = type = 0

try:
	handler = urllib2.urlopen(req)
	code = handler.getcode()
	type = handler.headers.getheader('content-type')
except:
	print("error")
	code = -1


if code == 200:
	print("Requete envoyee avec succes.")
elif code == 401:
	print("Erreur d'authentification")
else:
	print("Erreur d'envoi de la requete. Code " + str(code))

```