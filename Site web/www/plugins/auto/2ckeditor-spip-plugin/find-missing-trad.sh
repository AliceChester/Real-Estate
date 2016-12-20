#!/bin/sh

TESTFILE=test_lang_$1.php

echo "<?php " > $TESTFILE
echo "	error_reporting(E_ERROR | E_PARSE);" >> $TESTFILE
echo "	\$idx_lang = 'spiplang' ; " >> $TESTFILE
echo "	include 'lang/ckeditor_$1.php' ;" >> $TESTFILE
if [ -z "$2" ] ; then
	echo "	\$langstrs = array(" >> $TESTFILE
	# grep -R "ckeditor:" . | grep -v "ckeditor:tool_" | perl -ne "/([:'\"])ckeditor:(\w+)\1/ && print \"\t\t'\$2',\n\";" | sort | uniq >> $TESTFILE
	grep -R "ckeditor:" . | grep -v "ckeditor:tool_" | perl -ne "@a = /([:'\"])ckeditor:(\w+)\1/g;foreach(@a){print \$_;print \"\n\";}"|grep -vE "[:'\"]"|perl -ne "chop;print \"\t\t'\" ; print ; print \"',\n\";" >> $TESTFILE
	echo "	) ; " >> $TESTFILE
	echo "	\$langmsgs = array();" >> $TESTFILE
else
	echo "	\$idx_lang = 'langmsgs' ;" >> $TESTFILE
	echo "	include 'lang/ckeditor_$2.php' ;" >> $TESTFILE
	echo "	\$langstrs = array_keys(\$langmsgs);" >> $TESTFILE
fi
echo "	include 'lang.inc.php' ;" >> $TESTFILE
echo "?>" >> $TESTFILE

php $TESTFILE > lang_$1.php
rm $TESTFILE
