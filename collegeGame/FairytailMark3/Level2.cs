using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Media;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace FairytailMark3
{
    public partial class Level2 : Form
    {
        public Level2(string PlayerName, string PlayerChoice, int Health, int Score)
        {
            InitializeComponent();

            health = Health;
            score = Score;

            playerName = PlayerName;
            playerChoice = PlayerChoice;
            timerTimeRemaining.Start();
            HealthChange("Up", 0);
            ScoreChange("Up", 0);


        }
        int health, score;
        string path = "LeaderBoard.txt";
        string playerChoice;
        string Enemy = "Batman", Enemy1 = "Thor";
        string playerName = "";
        string Enemy1LastMove = "";
        string Enemy0LastMove = "";


        int[,] mazePlan =
        {
            //0 == Paths
            // 1 == Walls
            // 3 == Finish
            // 4->6 == Fire
            // 10 -> 19 = Coins           
            {1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1},
            {1, 10, 1, 10, 0, 0, 0, 0, 0, 0, 1, 4, 4,  0, 0, 0, 0, 4,  4,  0, 0, 0, 0, 4, 0, 0, 10, 1},
            {1, 0,  1,  1, 1, 0, 1, 0, 1, 0, 1, 0, 0,  0, 4, 5, 0, 0,  0,  0, 1, 4, 0, 5, 0, 1,  0, 1},
            {1, 0,  0,  0, 1, 0, 1, 0, 1, 0, 1, 0, 1,  1, 5, 4, 1, 1,  1,  1, 1, 5, 0, 0, 0, 1,  0, 1},
            {1, 0,  4,  0, 1, 0, 1, 0, 0, 0, 1, 0, 1,  0, 0, 0, 0, 1, 10,  0, 1, 1, 1, 1, 1, 1,  0, 1},
            {1, 0,  1,  0, 6, 0, 1, 0, 1, 0, 0, 0, 1,  0, 1, 1, 0, 1,  1, 10, 0, 0, 0, 0, 0, 1,  0, 1},
            {1, 0,  1,  0, 0, 0, 0, 0, 1, 0, 1, 1, 1,  0, 0, 1, 0, 0,  1,  1, 1, 1, 1, 1, 0, 1,  0, 1},
            {1, 0,  1,  0, 6, 0, 1, 0, 1, 0, 0, 0, 1,  1, 0, 1, 1, 0,  0,  0, 0, 0, 0, 0, 0, 0,  0, 1},
            {1, 0,  4,  0, 1, 0, 1, 0, 0, 0, 1, 3, 1,  0, 0, 0, 1, 1,  1,  1, 1, 1, 1, 1, 1, 1,  1, 1},
            {1, 0,  1,  0, 1, 0, 1, 0, 1, 1, 1, 1, 1,  0, 1, 0, 0, 0,  0,  0, 0, 0, 0, 0, 0, 0,  0, 1},
            {1, 0,  0,  0, 0, 0, 1, 0, 0, 0, 0, 0, 1,  0, 1, 1, 1, 1,  1,  1, 1, 1, 1, 1, 1, 1,  0, 1},
            {1, 0,  1,  1, 1, 0, 1, 1, 1, 1, 1, 0, 0,  0, 1, 0, 0, 0,  0,  5, 5, 0, 0, 0, 0, 1,  0, 1},
            {1, 10, 1, 10, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10, 1, 2, 4, 4,  0,  0, 0, 0, 6, 6, 0, 0,  0, 1},
            {1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1},
        };

        private void Level2_Paint(object sender, PaintEventArgs e)
        {
            for (int row = 0; row < 14; row++)
            {
                for (int col = 0; col < 28; col++)
                {
                    if (mazePlan[row, col] == 0)
                    {
                        e.Graphics.DrawImage(Floor, xCord, yCord, 40, 40);
                    }
                    if (mazePlan[row, col] == 1)
                    {
                        e.Graphics.DrawImage(Stonework, xCord, yCord, 40, 40);
                    }
                    if (mazePlan[row, col] == 2)
                    {
                        e.Graphics.DrawImage(Start, xCord, yCord, 40, 40);
                    }

                    else if (mazePlan[row, col] == 3)
                    {
                        e.Graphics.DrawImage(Finish, xCord, yCord, 40, 40);
                    }
                    //Draw Fire
                    else if (mazePlan[row, col] == 4)
                    {
                        e.Graphics.DrawImage(Fire1, xCord, yCord, 40, 40);
                    }
                    else if (mazePlan[row, col] == 5)
                    {
                        e.Graphics.DrawImage(Fire2, xCord, yCord, 40, 40);
                    }
                    else if (mazePlan[row, col] == 6)
                    {
                        e.Graphics.DrawImage(Fire3, xCord, yCord, 40, 40);
                    }
                    // Draw Collectables
                    if (mazePlan[row, col] >= 10 && mazePlan[row, col] <= 19)
                    { //Pick apparopriate image from coin array to show coins spinning
                        e.Graphics.DrawImage(CoinSelection[(mazePlan[row, col]) - 10], xCord, yCord, 40, 40);
                    }

                    xCord += 40;
                }
                xCord = 0;
                yCord += 40;
            }
            xCord = yCord = 0;
        }

        //Function to Move Characters
        private void MoveCharacter(string Character, string Direction, int YPosition, int XPosition)
        {
            if (levelEnded == false)
            {
                if (Direction == "Down")
                {
                    YPosition += 40;
                }
                else if (Direction == "Up")
                {
                    YPosition -= 40;
                }
                else if (Direction == "Left")
                {
                    XPosition -= 40;
                }
                else if (Direction == "Right")
                {
                    XPosition += 40;
                }
                if (Character == playerChoice)
                {
                    if (mazePlan[(YPosition / 40), (XPosition / 40)] != 1)
                    {
                        if (mazePlan[(YPosition / 40), (XPosition / 40)] >= 10 && mazePlan[(YPosition / 40), (XPosition / 40)] <= 19 && Character == playerChoice)
                        {
                            mazePlan[(YPosition / 40), (XPosition / 40)] = 0;
                            ScoreChange("Up", 5);
                            SoundPlayer CoinCollect = new SoundPlayer(Properties.Resources.CollectCoin);
                            CoinCollect.Play();
                        }

                        PositionX = XPosition;
                        PositionY = YPosition;
                        PictureBoxPlayer.Location = new Point(PositionX, PositionY);
                    }
                }
                else if (Character != playerChoice)
                {
                    if (mazePlan[(YPosition / 40), (XPosition / 40)] != 1)
                    {

                        if (Character == Enemy)
                        {
                            EnemyPositionX = XPosition;
                            EnemyPositionY = YPosition;
                            PictureBoxEnemy.Location = new Point(EnemyPositionX, EnemyPositionY);
                        }
                        else if (Character == Enemy1)
                        {
                            Enemy1PositionX = XPosition;
                            Enemy1PositionY = YPosition;
                            PictureBoxEnemy2.Location = new Point(Enemy1PositionX, Enemy1PositionY);
                        }
                    }

                }

                if (mazePlan[YPosition / 40, XPosition / 40] == 3)
                {
                    if (AllItemsCollected() == true)
                    {

                        FinishLevel(true, false);

                    }
                    else if (AllItemsCollected() == false)
                    {
                        MessageBox.Show("Keep Going " + playerName);
                    }
                }

                if (EnemyPositionX == PositionX && EnemyPositionY == PositionY || Enemy1PositionX == PositionX && Enemy1PositionY == PositionY)
                {
                    HealthChange("Down", 20);
                }
                else if (mazePlan[(PositionY / 40), (PositionX / 40)] >= 4 && mazePlan[(PositionY / 40), (PositionX / 40)] <= 6)
                {
                    HealthChange("Down", 5);
                }
            }

        }



        //Function to Check if any Collectables are Remaining
        private bool AllItemsCollected()
        {
            int counter = 0;
            for (int row = 0; row < 13; row++)
            {
                for (int col = 0; col < 27; col++)
                {
                    if (mazePlan[row, col] >= 10 && mazePlan[row, col] <= 19)
                    {
                        counter++;
                    }
                }
            }
            if (counter > 0)
            {
                return false;
            }
            else
            {
                return true;
            }
        }

        //Function to Update Character Images
        private void SelectImage(PictureBox ChangedPicBox, string Char, string Direction, string Moving)
        {
            //Joker Images
            if (Char == "Joker")
            {
                if (Moving == "Yes")
                {
                    if (Direction == "Up")
                    {
                        ChangedPicBox.Image = Properties.Resources.JokerUp;
                    }
                    else if (Direction == "Down")
                    {
                        ChangedPicBox.Image = Properties.Resources.JokerDown;
                    }
                    else if (Direction == "Left")
                    {
                        ChangedPicBox.Image = Properties.Resources.JokerLeft;
                    }
                    else if (Direction == "Right")
                    {
                        ChangedPicBox.Image = Properties.Resources.JokerRight;
                    }
                }
                else if (Moving == "No")
                {
                    if (Direction == "Up")
                    {
                        ChangedPicBox.Image = Properties.Resources.JokerUp2;
                    }
                    else if (Direction == "Down")
                    {
                        ChangedPicBox.Image = Properties.Resources.JokerDown2;
                    }
                    else if (Direction == "Left")
                    {
                        ChangedPicBox.Image = Properties.Resources.JokerLeft2;
                    }
                    else if (Direction == "Right")
                    {
                        ChangedPicBox.Image = Properties.Resources.JokerRight2;
                    }
                }

            }
            // Harley Images
            else if (Char == "Harley")
            {
                if (Moving == "Yes")
                {
                    if (Direction == "Up")
                    {
                        ChangedPicBox.Image = Properties.Resources.HarleyUp;
                    }
                    else if (Direction == "Down")
                    {
                        ChangedPicBox.Image = Properties.Resources.HarleyDown;
                    }
                    else if (Direction == "Left")
                    {
                        ChangedPicBox.Image = Properties.Resources.HarleyLeft;
                    }
                    else if (Direction == "Right")
                    {
                        ChangedPicBox.Image = Properties.Resources.HarleyRight;
                    }
                }
                else if (Moving == "No")
                {
                    if (Direction == "Up")
                    {
                        ChangedPicBox.Image = Properties.Resources.HarleyUp2;
                    }
                    else if (Direction == "Down")
                    {
                        ChangedPicBox.Image = Properties.Resources.HarleyDown2;
                    }
                    else if (Direction == "Left")
                    {
                        ChangedPicBox.Image = Properties.Resources.HarleyLeft2;
                    }
                    else if (Direction == "Right")
                    {
                        ChangedPicBox.Image = Properties.Resources.HarleyRight2;
                    }
                }
            }
            //Batman Images
            else if (Char == "Batman")
            {
                if (Moving == "Yes")
                {
                    if (Direction == "Up")
                    {
                        ChangedPicBox.Image = Properties.Resources.BatmanUp;
                    }
                    else if (Direction == "Down")
                    {
                        ChangedPicBox.Image = Properties.Resources.BatmanDown;
                    }
                    else if (Direction == "Left")
                    {
                        ChangedPicBox.Image = Properties.Resources.BatmanLeft;
                    }
                    else if (Direction == "Right")
                    {
                        ChangedPicBox.Image = Properties.Resources.BatmanRight;
                    }
                }
                else if (Moving == "No")
                {
                    if (Direction == "Up")
                    {
                        ChangedPicBox.Image = Properties.Resources.BatmanUp2;
                    }
                    else if (Direction == "Down")
                    {
                        ChangedPicBox.Image = Properties.Resources.BatmanDown2;
                    }
                    else if (Direction == "Left")
                    {
                        ChangedPicBox.Image = Properties.Resources.BatmanLeft2;
                    }
                    else if (Direction == "Right")
                    {
                        ChangedPicBox.Image = Properties.Resources.BatmanRight2;
                    }
                }
            }
            //Thor Images
            else if (Char == "Thor")
            {
                if (Moving == "Yes")
                {
                    if (Direction == "Up")
                    {
                        ChangedPicBox.Image = Properties.Resources.ThorUp;
                    }
                    else if (Direction == "Down")
                    {
                        ChangedPicBox.Image = Properties.Resources.ThorDown;
                    }
                    else if (Direction == "Left")
                    {
                        ChangedPicBox.Image = Properties.Resources.ThorLeft;
                    }
                    else if (Direction == "Right")
                    {
                        ChangedPicBox.Image = Properties.Resources.ThorRight;
                    }
                }
                else if (Moving == "No")
                {
                    if (Direction == "Up")
                    {
                        ChangedPicBox.Image = Properties.Resources.ThorUp2;
                    }
                    else if (Direction == "Down")
                    {
                        ChangedPicBox.Image = Properties.Resources.ThorDown2;
                    }
                    else if (Direction == "Left")
                    {
                        ChangedPicBox.Image = Properties.Resources.ThorLeft2;
                    }
                    else if (Direction == "Right")
                    {
                        ChangedPicBox.Image = Properties.Resources.ThorRight2;
                    }
                }

            }




        }

        //Function to Move Enemy on a Set Path, linked to timerEnemy. 
        private void MoveEnemy(string VerticalHorizontal, string EnemyLastMove, string Character, PictureBox CharToMove, int xPosition, int yPosition)
        {
            if (VerticalHorizontal == "Vertical")
            {
                if (mazePlan[(yPosition / 40) + 1, (xPosition / 40)] != 1 && EnemyLastMove != "Up")
                {
                    SelectImage(CharToMove, Character, "Down", "Yes");
                    MoveCharacter(Character, "Down", yPosition, xPosition);
                    EnemyLastMove = "Down";
                }
                else if (mazePlan[(yPosition / 40) - 1, (xPosition / 40)] != 1)
                {

                    SelectImage(CharToMove, Character, "Up", "Yes");
                    MoveCharacter(Character, "Up", yPosition, xPosition);
                    EnemyLastMove = "Up";
                }
                else if (mazePlan[(yPosition / 40) + 1, (xPosition / 40)] != 1)
                {
                    SelectImage(CharToMove, Character, "Down", "Yes");
                    MoveCharacter(Character, "Down", yPosition, xPosition);
                    EnemyLastMove = ("Down");
                }
            }
            else if (VerticalHorizontal == "Horizontal")
            {
                if (mazePlan[(yPosition / 40), (xPosition / 40) - 1] != 1 && EnemyLastMove != "Right")
                {
                    SelectImage(CharToMove, Character, "Left", "Yes");
                    MoveCharacter(Character, "Left", yPosition, xPosition);
                    EnemyLastMove = "Left";
                }
                else if (mazePlan[(yPosition / 40), (xPosition / 40) + 1] != 1)
                {

                    SelectImage(CharToMove, Character, "Right", "Yes");
                    MoveCharacter(Character, "Right", yPosition, xPosition);
                    EnemyLastMove = "Right";
                }
                else if (mazePlan[(yPosition / 40), (xPosition / 40) - 1] != 1)
                {
                    SelectImage(CharToMove, Character, "Left", "Yes");
                    MoveCharacter(Character, "Left", yPosition, xPosition);
                    EnemyLastMove = ("Left");
                }

            }
            if (CharToMove == PictureBoxEnemy)
            {
                Enemy0LastMove = EnemyLastMove;
            }
            else if (CharToMove == PictureBoxEnemy2)
            {
                Enemy1LastMove = EnemyLastMove;
            }

        }

        //Function to Animate Environment 
        private void EnvironmentAnimate()
        {
            for (int row = 0; row < 14; row++)
            {
                for (int col = 0; col < 28; col++) // This sections updates fire images
                {
                    if (mazePlan[row, col] == 4)
                    {
                        mazePlan[row, col] = 5;
                    }
                    else if (mazePlan[row, col] == 5)
                    {
                        mazePlan[row, col] = 6;
                    }
                    else if (mazePlan[row, col] == 6)
                    {
                        mazePlan[row, col] = 4;
                    }
                    // Start Updating Coin Images
                    else if (mazePlan[row, col] <= 18 && 10 <= mazePlan[row, col])
                    {
                        mazePlan[row, col]++;
                    }
                    else if (mazePlan[row, col] == 19)
                    {
                        mazePlan[row, col] = 10;
                    }

                }
            }
            Invalidate();
        }

        //Function to Change Health
        private void HealthChange(string UpDown, int Amount)
        {
            if (UpDown == "Up")
            {
                health += Amount;
            }
            else if (UpDown == "Down")
            {
                health -= Amount;
            }

            lblHealth.Text = "Health: " + health;

            if (health <= 0)
            {
                FinishLevel(false, false);
            }

        }

        //Function to Change Score
        private void ScoreChange(string UpDown, int Amount)
        {
            if (UpDown == "Up")
            {
                score += Amount;
            }
            else if (UpDown == "Down")
            {
                score -= Amount;
            }

            lblScore.Text = "Score: " + score;
        }

        //Function for Finishing Level/Game
        private void FinishLevel(bool Win, bool LastLevel)
        {
            timerTimeRemaining.Stop();
            timerEnemy.Stop();
            levelEnded = true;

            if (Win == true)
            {
                MessageBox.Show("Well done!");
                timeRemaining = Math.Round(timeRemaining, 0);
                int FinishBonus = Convert.ToInt16(timeRemaining) + (health / 2);
                ScoreChange("Up", (FinishBonus));
                Level3 Level3 = new Level3(playerName, playerChoice, health, score);
                Level3.Show();
                Close();

            }
            if (Win == false)
            {
                timerEnvironment.Stop();
                MessageBox.Show("You lost, better luck next time.");
            }
            if (Win == false || LastLevel == true)
            {
                File.AppendAllText(path, playerName + ":" + score + Environment.NewLine);
                timerEnvironment.Stop();
                ScoreBoardForm LeaderBoard = new ScoreBoardForm();
                LeaderBoard.Show();
                Close();
            }

        }

        private void Level2_Load(object sender, EventArgs e)
        {
            timerEnemy.Start();
            timerEnvironment.Start();
            timerTimeRemaining.Start();

            if (playerChoice == "Joker")
            {
                PictureBoxPlayer.Image = Properties.Resources.JokerUp2;
                PictureBoxEnemy.Image = Properties.Resources.BatmanDown;
                PictureBoxEnemy2.Image = Properties.Resources.ThorDown;
            }
            else if (playerChoice == "Harley")
            {
                PictureBoxPlayer.Image = Properties.Resources.HarleyUp2;
                PictureBoxEnemy.Image = Properties.Resources.ThorDown;
                PictureBoxEnemy2.Image = Properties.Resources.BatmanDown;
                Enemy = "Thor";
                Enemy1 = "Batman";
            }
            else if (playerChoice == "Batman")
            {
                PictureBoxPlayer.Image = Properties.Resources.BatmanUp2;
                PictureBoxEnemy.Image = Properties.Resources.HarleyDown;
                PictureBoxEnemy2.Image = Properties.Resources.JokerDown;
                Enemy = "Harley";
                Enemy1 = "Joker";
            }
            else if (playerChoice == "Thor")
            {
                PictureBoxPlayer.Image = Properties.Resources.ThorUp2;
                PictureBoxEnemy.Image = Properties.Resources.HarleyDown;
                PictureBoxEnemy2.Image = Properties.Resources.JokerDown;
                Enemy = "Joker";
                Enemy1 = "Harley";
            }



            CoinSelection[0] = Coin0;
            CoinSelection[1] = Coin1;
            CoinSelection[2] = Coin2;
            CoinSelection[3] = Coin3;
            CoinSelection[4] = Coin4;
            CoinSelection[5] = Coin5;
            CoinSelection[6] = Coin6;
            CoinSelection[7] = Coin7;
            CoinSelection[8] = Coin8;
            CoinSelection[9] = Coin9;



            PictureBoxPlayer.Location = new Point(600, 480);
            PictureBoxEnemy.Location = new Point(200, 40);
            PictureBoxEnemy2.Location = new Point(1040, 40);
        }




        // Environment Images
        Bitmap Stonework = new Bitmap(Properties.Resources.Stonework1);
        Bitmap Water = new Bitmap(Properties.Resources.WaterSprite);
        Bitmap Finish = new Bitmap(Properties.Resources.FinishPad);
        Bitmap Floor = new Bitmap(Properties.Resources.Grass4);
        Bitmap Start = new Bitmap(Properties.Resources.LadderDown2);

        //Fire Images
        Bitmap Fire1 = new Bitmap(Properties.Resources.FireSprite1);
        Bitmap Fire2 = new Bitmap(Properties.Resources.FireSprite2);
        Bitmap Fire3 = new Bitmap(Properties.Resources.FireSprite3);
        //Coin Images
        Bitmap Coin0 = new Bitmap(Properties.Resources.SpinningCoin0);
        Bitmap Coin1 = new Bitmap(Properties.Resources.SpinningCoin1);
        Bitmap Coin2 = new Bitmap(Properties.Resources.SpinningCoin2);
        Bitmap Coin3 = new Bitmap(Properties.Resources.SpinningCoin3);
        Bitmap Coin4 = new Bitmap(Properties.Resources.SpinningCoin4);
        Bitmap Coin5 = new Bitmap(Properties.Resources.SpinningCoin5);
        Bitmap Coin6 = new Bitmap(Properties.Resources.SpinningCoin6);
        Bitmap Coin7 = new Bitmap(Properties.Resources.SpinningCoin7);
        Bitmap Coin8 = new Bitmap(Properties.Resources.SpinningCoin8);
        Bitmap Coin9 = new Bitmap(Properties.Resources.SpinningCoin9);

        Bitmap[] CoinSelection = new Bitmap[10];
        int xCord = 0, yCord = 0;
        bool levelEnded = false;
        double timeRemaining = 60;

        enum Position
        {
            Left, Right, Up, Down, Stop
        }

        Position objPosition;


        private void Level2_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Left)
            {
                objPosition = Position.Left;
                SelectImage(PictureBoxPlayer, playerChoice, "Left", "No");
            }
            if (e.KeyCode == Keys.Right)
            {
                objPosition = Position.Right;
                SelectImage(PictureBoxPlayer, playerChoice, "Right", "No");
            }
            if (e.KeyCode == Keys.Up)
            {
                objPosition = Position.Up;
                SelectImage(PictureBoxPlayer, playerChoice, "Up", "No");
            }
            if (e.KeyCode == Keys.Down)
            {
                objPosition = Position.Down;
                SelectImage(PictureBoxPlayer, playerChoice, "Down", "No");
            }
            if (objPosition == Position.Right)
            {
                MoveCharacter(playerChoice, "Right", PositionY, PositionX);
                SelectImage(PictureBoxPlayer, playerChoice, "Right", "Yes");
            }
            else if (objPosition == Position.Left)
            {
                MoveCharacter(playerChoice, "Left", PositionY, PositionX);
                SelectImage(PictureBoxPlayer, playerChoice, "Left", "Yes");
            }
            else if (objPosition == Position.Up)
            {
                MoveCharacter(playerChoice, "Up", PositionY, PositionX);
                SelectImage(PictureBoxPlayer, playerChoice, "Up", "Yes");
            }

            else if (objPosition == Position.Down)
            {
                MoveCharacter(playerChoice, "Down", PositionY, PositionX);
                SelectImage(PictureBoxPlayer, playerChoice, "Down", "Yes");
            }
        }

        private void timerTimeRemaining_Tick(object sender, EventArgs e)
        {
            timeRemaining -= 0.1;
            timeRemaining = Math.Round(timeRemaining, 1, MidpointRounding.AwayFromZero);
            lblTimeRemaining.Text = "Time: " + timeRemaining;
            if (timeRemaining == 0)
            {
                FinishLevel(false, false);
            }
        }

        private void timerEnvironment_Tick(object sender, EventArgs e)
        {
            EnvironmentAnimate();
        }

        private void timerEnemy_Tick(object sender, EventArgs e)
        {
            MoveEnemy("Vertical", Enemy0LastMove, Enemy, PictureBoxEnemy, EnemyPositionX, EnemyPositionY);
            MoveEnemy("Vertical", Enemy1LastMove, Enemy1, PictureBoxEnemy2, Enemy1PositionX, Enemy1PositionY);
        }


        int PositionX = 600, PositionY = 480, EnemyPositionX = 200, EnemyPositionY = 40, Enemy1PositionX = 1040, Enemy1PositionY = 40;



    }
}