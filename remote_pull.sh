

if [ "$*" != "" ]
then
fastadd.sh "$*"
else
fastadd.sh "Fast add without comment"
fi


sh ../newspull.sh
