using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.IO;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace FairytailMark3
{
    public partial class ScoreBoardForm : Form
    {

        public ScoreBoardForm()
        {
            InitializeComponent();
        }

       

        static string[] LeaderContent = File.ReadAllLines("LeaderBoard.txt");

        int[] scores = new int[LeaderContent.Length];
        string[] names = new string[LeaderContent.Length];
        int[] SortedScores = new int[LeaderContent.Length];
        string[] SortedNames = new string[LeaderContent.Length];
        int counterNames = 0;
        int counterScores = 0;


        private void ScoreBoardForm_Load(object sender, EventArgs e)
        {
            //LeaderContent = File.ReadAllLines("Leaderboard.txt");


            foreach (string Entry in LeaderContent)
            {
                int i = 0;
                string[] SingleData = Entry.Split(':');
                foreach (string data in SingleData)
                {
                    if (i == 0)
                    {
                        names[counterNames] = data;
                        counterNames++;
                        i = 1;
                    }
                    else if (i == 1)
                    {
                        int AddThis = Convert.ToInt16(data);
                        scores[counterScores] = AddThis;
                        counterScores++;
                        i = 0;
                    }
                }
            }
            SortData();

            /*
            foreach (string Entry in LeaderContent)
            {
                
                string[] SingleData = Entry.Split(':');
                foreach (string data in SingleData)
                {
                    lblInfo.Text += data + "          ";
                    
                }

                lblInfo.Text += "\n";
            }*/
            for (int j = 0; j < SortedNames.Length && j < 8; j++) // Change j < 8 to display different amount of scores
            {
                lblNames.Text += SortedNames[j] + "\n";
                lblScores.Text += SortedScores[j] + "\n";
            }


        }

        private void btnHome_Click(object sender, EventArgs e)
        {
            Close();
        }



        private void SortData()
        {

            int lessThan = 0;
            for (int i = 0; i < scores.Length; i++)
            {
                int counter = -1;
                int CurrentCheck = scores[i];
                foreach (int score in scores)
                {
                    counter++;
                    if (score > CurrentCheck)
                    {
                        lessThan++;
                    }
                    else if (score == CurrentCheck)
                    {
                        if (i != counter && i > counter)
                        {
                            lessThan++;
                        }
                    }

                }
                SortedScores[lessThan] = CurrentCheck;
                SortedNames[lessThan] = names[i];
                lessThan = 0;

            }

        }

        private void btnHome_Click_1(object sender, EventArgs e)
        {

        }
    }
}
