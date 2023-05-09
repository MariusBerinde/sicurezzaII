# creazione certificati
openssl req -x509 -newkey rsa:4096 -keyout key.pem -out cert.pem -days 365 -nodes -subj /CN=MyHost.com
# Create a PKCS12 file :
openssl pkcs12 -export -in cert.pem -inkey key.pem -out myfile.p12 -name "Alias of cert"
