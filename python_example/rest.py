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