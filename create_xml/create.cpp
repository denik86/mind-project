

#include <stdlib.h> 

#include <iostream>
#include <string>
#include <vector>
#include <stdio.h>

using namespace std;

#include "tinyxml.h"


enum Lang {eng, ita};

string LangToString(Lang lang) {
	switch (lang)
	{
		case 0:
		return "eng";
		case 1:
		return "ita";
		default:
		return "error";
	}
	return "";
}

TiXmlElement * createTranslation(string tra, string note) {
	
	// create elements
	TiXmlElement * traElement = new TiXmlElement("tra");
	TiXmlElement * noteElement = new TiXmlElement("note");

	// insert tra text
	TiXmlText * traText = new TiXmlText(tra);
	traElement->LinkEndChild(traText);

	// create and insert note text
	TiXmlText * noteText = new TiXmlText(note);
	noteElement->LinkEndChild(noteText);
	traElement->LinkEndChild(noteElement);

	return traElement;
}

TiXmlElement * createEmptyWord(string word, Lang from, Lang to, string note) {
	
	// create elements
	TiXmlElement * wordElement = new TiXmlElement("word");
	TiXmlElement * noteElement = new TiXmlElement("note");

	// Add attributes
	wordElement->SetAttribute("from", LangToString(from));
	wordElement->SetAttribute("to", LangToString(to));

	// Add word text
	TiXmlText * wordText = new TiXmlText("word");
	wordElement->LinkEndChild(wordText);

	// create and insert note text
	TiXmlText * noteText = new TiXmlText(note);
	noteElement->LinkEndChild(noteText);
	wordElement->LinkEndChild(noteElement);

	return wordElement;
}


int main()
{
	bool cont = true; // continue app flag
	int ans; // answer of user
	int instances = 0; // number of data instances
	while(cont)
	{
		// entered for the first time in the program
		if(instances == 0) {
			std::cout << "\n***********\nWelcome to writing english word in xml file." << std::endl;
			std::cout << "Do you want to start? YES = 0, NO = 1: ";
			std::cin >> ans;
			if(ans == 1) exit(0);
		}
		instances++; // increment comand instance

		// TODO: creare lista di opzioni: vedi voci, carica una voce, modifica voce, elimina
		// TODO: lista voci caricamento
		// TODO: caricare voce
		// TODO: modificare voce

		std::cout << "Importo XML" << std::endl;
		TiXmlDocument doc("english_words.xml");
		bool loadOk = doc.LoadFile();
		if(loadOk) {
			printf("\n%s:\n", "Importato correttanetme!");
		} else {
			printf("Failed");
		}

		TiXmlNode* root = doc.FirstChild();
		if(root == NULL)
		{
			cerr << "Failed to load file: no root element" << endl;
			doc.Clear();
		}

		int i = 1;
		const char* attr;
		const char* text;
		for(TiXmlNode* elemNode = root->FirstChild(); elemNode != NULL; elemNode = elemNode->NextSibling())
		{
			TiXmlElement * elem = elemNode->ToElement();
		    string elemName = elem->Value();
		    attr = elem->Attribute("from");
		    text = elem->GetText();
		    cout << "Nome child " << i << ": " << elemName << endl;
		    cout << "Attr: " << attr << endl;
		    cout << "Text: " << text << endl;

		    i++;
		    cout << "**********************" << endl;
		    cout << endl;

		  
		    if(strcmp(text, "home") == 0)
		    {
		    	TiXmlElement * el = new TiXmlElement("prova");
		    	TiXmlText* textc = new TiXmlText("questa è una prova");
		    	el->SetAttribute("name", "john");
		    	el->LinkEndChild(textc);
		    	elem->LinkEndChild(el);

		    }
		}

		 TiXmlElement * newTra = createTranslation("mosaico", "il mosaico è un cazo");

		 TiXmlElement * newWord = createEmptyWord("mosaic", eng, ita, "note various");
		 newWord->LinkEndChild(newTra);

		 root->LinkEndChild(newWord);

		 		    	doc.SaveFile("prova2.xml");






		// continue the insertion of contents?
		std::cout << "Do you want to continue? YES = 0, NO = 1: ";
		std::cin >> ans;
		if(ans == 1) cont = false;
	}

}