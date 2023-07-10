namespace FairytailMark3
{
    partial class Level2
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Level2));
            this.lblTimeRemaining = new System.Windows.Forms.Label();
            this.lblHealth = new System.Windows.Forms.Label();
            this.lblScore = new System.Windows.Forms.Label();
            this.PictureBoxEnemy2 = new System.Windows.Forms.PictureBox();
            this.PictureBoxEnemy = new System.Windows.Forms.PictureBox();
            this.PictureBoxPlayer = new System.Windows.Forms.PictureBox();
            ((System.ComponentModel.ISupportInitialize)(this.PictureBoxEnemy2)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.PictureBoxEnemy)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.PictureBoxPlayer)).BeginInit();
            this.SuspendLayout();
            // 
            // lblTimeRemaining
            // 
            this.lblTimeRemaining.AutoSize = true;
            this.lblTimeRemaining.BackColor = System.Drawing.Color.Transparent;
            this.lblTimeRemaining.Font = new System.Drawing.Font("Monotype Corsiva", 12F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblTimeRemaining.ForeColor = System.Drawing.Color.DarkRed;
            this.lblTimeRemaining.Location = new System.Drawing.Point(533, 532);
            this.lblTimeRemaining.Name = "lblTimeRemaining";
            this.lblTimeRemaining.Size = new System.Drawing.Size(45, 18);
            this.lblTimeRemaining.TabIndex = 18;
            this.lblTimeRemaining.Text = "Time:";
            // 
            // lblHealth
            // 
            this.lblHealth.AutoSize = true;
            this.lblHealth.BackColor = System.Drawing.Color.Transparent;
            this.lblHealth.Font = new System.Drawing.Font("Monotype Corsiva", 12F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblHealth.ForeColor = System.Drawing.Color.DarkRed;
            this.lblHealth.Location = new System.Drawing.Point(944, 19);
            this.lblHealth.Name = "lblHealth";
            this.lblHealth.Size = new System.Drawing.Size(87, 18);
            this.lblHealth.TabIndex = 17;
            this.lblHealth.Text = "Health: 100";
            // 
            // lblScore
            // 
            this.lblScore.AutoSize = true;
            this.lblScore.BackColor = System.Drawing.Color.Transparent;
            this.lblScore.Font = new System.Drawing.Font("Monotype Corsiva", 12F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblScore.ForeColor = System.Drawing.Color.DarkRed;
            this.lblScore.Location = new System.Drawing.Point(533, 20);
            this.lblScore.Name = "lblScore";
            this.lblScore.Size = new System.Drawing.Size(52, 18);
            this.lblScore.TabIndex = 16;
            this.lblScore.Text = "Score: ";
            // 
            // PictureBoxEnemy2
            // 
            this.PictureBoxEnemy2.BackColor = System.Drawing.Color.Transparent;
            this.PictureBoxEnemy2.InitialImage = ((System.Drawing.Image)(resources.GetObject("PictureBoxEnemy2.InitialImage")));
            this.PictureBoxEnemy2.Location = new System.Drawing.Point(791, 289);
            this.PictureBoxEnemy2.Name = "PictureBoxEnemy2";
            this.PictureBoxEnemy2.Size = new System.Drawing.Size(40, 40);
            this.PictureBoxEnemy2.TabIndex = 15;
            this.PictureBoxEnemy2.TabStop = false;
            // 
            // PictureBoxEnemy
            // 
            this.PictureBoxEnemy.BackColor = System.Drawing.Color.Transparent;
            this.PictureBoxEnemy.InitialImage = ((System.Drawing.Image)(resources.GetObject("PictureBoxEnemy.InitialImage")));
            this.PictureBoxEnemy.Location = new System.Drawing.Point(536, 69);
            this.PictureBoxEnemy.Name = "PictureBoxEnemy";
            this.PictureBoxEnemy.Size = new System.Drawing.Size(40, 40);
            this.PictureBoxEnemy.TabIndex = 14;
            this.PictureBoxEnemy.TabStop = false;
            // 
            // PictureBoxPlayer
            // 
            this.PictureBoxPlayer.BackColor = System.Drawing.Color.Transparent;
            this.PictureBoxPlayer.InitialImage = ((System.Drawing.Image)(resources.GetObject("PictureBoxPlayer.InitialImage")));
            this.PictureBoxPlayer.Location = new System.Drawing.Point(119, 69);
            this.PictureBoxPlayer.Name = "PictureBoxPlayer";
            this.PictureBoxPlayer.Size = new System.Drawing.Size(40, 40);
            this.PictureBoxPlayer.TabIndex = 13;
            this.PictureBoxPlayer.TabStop = false;
            // 
            // Level2
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1102, 564);
            this.Controls.Add(this.lblTimeRemaining);
            this.Controls.Add(this.lblHealth);
            this.Controls.Add(this.lblScore);
            this.Controls.Add(this.PictureBoxEnemy2);
            this.Controls.Add(this.PictureBoxEnemy);
            this.Controls.Add(this.PictureBoxPlayer);
            this.ForeColor = System.Drawing.Color.DarkRed;
            this.Name = "Level2";
            this.Text = "Level2";
            this.Load += new System.EventHandler(this.Level2_Load);
            ((System.ComponentModel.ISupportInitialize)(this.PictureBoxEnemy2)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.PictureBoxEnemy)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.PictureBoxPlayer)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label lblTimeRemaining;
        private System.Windows.Forms.Label lblHealth;
        private System.Windows.Forms.Label lblScore;
        private System.Windows.Forms.PictureBox PictureBoxEnemy2;
        private System.Windows.Forms.PictureBox PictureBoxEnemy;
        private System.Windows.Forms.PictureBox PictureBoxPlayer;
    }
}