var myCodeMirror = CodeMirror.fromTextArea(document.getElementById('code'), {
		  lineNumbers: true,               // показывать номера строк
		  matchBrackets: true,			 // подсвечивать парные скобки
		  mode: 'text/x-c++src',		// стиль подсветки
		  autoCloseBrackets: true,
		  theme: "material",
		  indentUnit: 4                    // размер табуляции
		});
		//application/x-httpd-php
		//text/x-c++src
		//text/x-java
		//python