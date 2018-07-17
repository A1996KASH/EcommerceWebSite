
'''

#############################################################################################
#                                                                                           #
#                        File Name : getEmail.py                                            #
#                        Author :   grtdeveloper                                            #
#                        Created On : 03/06/17                                              #    
#                                                                                           #
#############################################################################################


'''

from validate_email import validate_email
import sys
import dns.resolver
import itertools
import string
import random
from random import randint


firstName = sys.argv[1]
surName = sys.argv[2]
domainName= sys.argv[3]


def validDns(domainName):
    records = dns.resolver.query(domainName, 'MX')
    mxRecord = records[0].exchange
    mxRecord = str(mxRecord)
    if len(mxRecord) < 5 or "0.0.0.0" in mxRecord:
        print '\n Invalid Domain name'
        return False
    else:
        return True


def randN(n):
	newVal = 0
    	assert n <= 10
    	l = list(range(10)) # compat py2 & py3
    	while l[0] == 0:
        	random.shuffle(l)
    	return int(''.join(str(d) for d in l[:n]))

   
def possibleEmail(firstName,surName,domainName):
    listEmail = []
    splChars = ['-',"_","."]
    listEmail.append(str(firstName) + splChars[0] + str(surName)  + "@" + str(domainName)) 
    listEmail.append(str(firstName) + splChars[1] + str(surName)  + "@" + str(domainName)) 
    listEmail.append(str(firstName) + splChars[2] + str(surName)  + "@" + str(domainName)) 

    for i in range(0,10000): 
        listEmail.append(str(firstName) + str(surName) + str(randN(4)) + "@" + str(domainName))

    return listEmail

if validDns(domainName) is True:
    ## Check for Email Address in the domain
    mailIds = possibleEmail(firstName,surName,domainName)

i=0
retSts="Invalid"

while i < len(mailIds):
    is_valid = validate_email(mailIds[i],verify=True)
    if is_valid is True:
        retSts = "Valid" 
        i = len(mailIds)
    else:
            i = i + 1

#return retSts
