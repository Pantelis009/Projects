using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Media;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace FairytailMark3
{
    public partial class StartMenuForm : Form
    {
        // private StartMenuForm gifImage = null;
        // private string filePath = @"C:\Users\Pantelis\Desktop\Natsu.gif";
        
        string PlayersName = "";
        string PlayersChoice = "Natsu Dragneel";
        System.Media.SoundPlayer StartMenuMusic = new System.Media.SoundPlayer(Properties.Resources.FairytailTheme);
        public StartMenuForm()
        {
            InitializeComponent();
            StartMenuMusic.Play();

        }

        private void txtPlayerName_TextChanged(object sender, EventArgs e)
        {

        }

        private void pictureBoxNatsu_Click(object sender, EventArgs e)
        {
            PlayersChoice = "Natsu Dragneel";
            lblNatsuDragneel.ForeColor = Color.DarkRed;
            
            Invalidate();
            //BatmanSound.Play(); //Plays the sound for Batman
        }

        private void StartMenuForm_Load(object sender, EventArgs e)
        {
           
        }

        private void pictureBoxNATSU_Click_1(object sender, EventArgs e)
        {

        }

        private void txtPlayersName_MouseClick(object sender, MouseEventArgs e)
        {
            txtPlayersName.ForeColor = Color.DarkRed;
            txtPlayersName.Text = "";
        }

        private void txtPlayersName_Enter(object sender, EventArgs e)
        {
            PlayersName = txtPlayersName.Text;
        }
        private static bool ConfimrationOfText(String StringChecked)
        {
            if (StringChecked.Length <= 2)
            {
                return Regex.IsMatch(StringChecked, @"^[a-zA-Z]+$");
            }
            else
            {
                return false;
            }
        }
        private void StartOfGame()
        {
            PlayersName = txtPlayersName.Text;

            if (PlayersName != "" && PlayersName != "Enter Name Here")
            {
                if (ConfimrationOfText(PlayersName) == true)
                {
                    Level1 FormLevel1 = new Level1(PlayersChoice, PlayersName);
                    FormLevel1.Show();

                }
                else if (ConfimrationOfText(PlayersName) == false)
                {
                    MessageBox.Show("Please Enter Your Initials Only.\n( 2 Letters Only.)");
                }

            }
            else if (PlayersName == "" || PlayersName == "Enter Name ")
            {
                MessageBox.Show("Please Enter Name");
            }
        }

        private void txtPlayersName_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Enter)
            {
                StartOfGame();
            }
        }

        private void StartMenuForm_FormClosed(object sender, FormClosedEventArgs e)
        {
            Application.Exit();
        }

        private void btnRules_Click(object sender, EventArgs e)
        {
            Instructions Rules = new Instructions();
            Rules.Show();
        }

        private void btnScoreBoard_Click(object sender, EventArgs e)
        {
            ScoreBoardForm PreviousPlayers = new DC_Game.ScoreBoardForm();
            PreviousPlayers.Show();
        }

        private void StartMenuForm_Paint(object sender, PaintEventArgs e)
        {
            
        }

        private void btnStartGame_Click(object sender, EventArgs e)
        {
            StartOfGame();
        }
    }
}
