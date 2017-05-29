# BreweryDB Proxy

This is an example proxy script for working with the [BreweryDB API](http://www.brewerydb.com/developers) from a browser. _It is meant 
for instructional purposes only, and should not be used in a production environment with additional security measures._


## Usage

Pass a parameter **_ep** that contains the desired endpoint within the API, beginning with a forward slaash:
```$javascript
jQuery.getJSON("./index.php?_ep=/beers&name=Tropicalia");
```

Any other parameters will be sent to the requested endpoint, so this should allow full access to the API. It is 
currently only meant for making GET requests; any POST/PUT/DELETE requests will fail in unexpected (but spectacular?!) 
ways.

Cheers!
