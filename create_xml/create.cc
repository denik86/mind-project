#include <iostream>
#include <string>
#include <vector>
#include <stdlib.h> 

using namespace std;

enum To {ita, eng};

class Word {
private:
	string word;
	string word_note;
	To from_to;
	vector<string> trans;
	vector<string> notes;

public:
	void writexml() {

	}

};

int main()
{
	bool cont = true;
	int ans;
	int instances = 0;
	while(cont)
	{
		if(instances == 0) {
			cout << "\n***********\nWelcome to writing english word in xml file." << endl;
			cout << "Do you want to start? YES = 0, NO = 1: ";
			cin >> ans;
			if(ans == 1) exit(0);
		}





		cout << "Do you want to continue? YES = 0, NO = 1: ";
		cin >> ans;
		if(ans == 1) cont = false;
	}

}