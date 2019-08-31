## Installation
1. Run composer install
2. Set correct file permissions for the /tmp folder
3. Open index.php in your browser

## CLI usage

run:
 
php generateCodes.php --numberOfCodes x --lengthOfCode y --file z

where:

x - number of generated codes (range 1-1000000) - REQUIRED ARGUMENT

y - length of the generated codes (range 8-30) - REQUIRED ARGUMENT

z - name of the file, where the codes will be saved (/tmp folder) - OPTIONAL ARGUMENT
