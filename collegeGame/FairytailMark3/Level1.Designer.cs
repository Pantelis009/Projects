namespace FairytailMark3
{
    partial class Level1
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
            this.lblTimeRemaining = new System.Windows.Forms.Label();
            this.lblHealth = new System.Windows.Forms.Label();
            this.lblScore = new System.Windows.Forms.Label();
            this.PictureBoxEnemy2 = new System.Windows.Forms.PictureBox();
            this.PictureBoxEnemy = new System.Windows.Forms.PictureBox();
            this.PictureBoxCharacter = new System.Windows.Forms.PictureBox();
            ((System.ComponentModel.ISupportInitialize)(this.PictureBoxEnemy2)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.PictureBoxEnemy)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.PictureBoxCharacter)).BeginInit();
            this.SuspendLayout();
            // 
            // lblTimeRemaining
            // 
            this.lblTimeRemaining.AutoSize = true;
            this.lblTimeRemaining.BackColor = System.Drawing.Color.Transparent;
            this.lblTimeRemaining.Font = new System.Drawing.Font("Century Gothic", 10F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblTimeRemaining.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(224)))), ((int)(((byte)(224)))), ((int)(((byte)(224)))));
            this.lblTimeRemaining.Location = new System.Drawing.Point(408, 415);
            this.lblTimeRemaining.Name = "lblTimeRemaining";
            this.lblTimeRemaining.Size = new System.Drawing.Size(45, 17);
            this.lblTimeRemaining.TabIndex = 11;
            this.lblTimeRemaining.Text = "Time:";
            // 
            // lblHealth
            // 
            this.lblHealth.AutoSize = true;
            this.lblHealth.BackColor = System.Drawing.Color.Transparent;
            this.lblHealth.Font = new System.Drawing.Font("Century Gothic", 10F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblHealth.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(224)))), ((int)(((byte)(224)))), ((int)(((byte)(224)))));
            this.lblHealth.Location = new System.Drawing.Point(736, 12);
            this.lblHealth.Name = "lblHealth";
            this.lblHealth.Size = new System.Drawing.Size(84, 17);
            this.lblHealth.TabIndex = 10;
            this.lblHealth.Text = "Health: 100";
            // 
            // lblScore
            // 
            this.lblScore.AutoSize = true;
            this.lblScore.BackColor = System.Drawing.Color.Transparent;
            this.lblScore.Font = new System.Drawing.Font("Century Gothic", 10F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblScore.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(224)))), ((int)(((byte)(224)))), ((int)(((byte)(224)))));
            this.lblScore.Location = new System.Drawing.Point(408, 12);
            this.lblScore.Name = "lblScore";
            this.lblScore.Size = new System.Drawing.Size(54, 17);
            this.lblScore.TabIndex = 8;
            this.lblScore.Text = "Score: ";
            // 
            // PictureBoxEnemy2
            // 
            this.PictureBoxEnemy2.BackColor = System.Drawing.Color.Transparent;
            this.PictureBoxEnemy2.Location = new System.Drawing.Point(730, 276);
            this.PictureBoxEnemy2.Name = "PictureBoxEnemy2";
            this.PictureBoxEnemy2.Size = new System.Drawing.Size(40, 40);
            this.PictureBoxEnemy2.TabIndex = 12;
            this.PictureBoxEnemy2.TabStop = false;
            // 
            // PictureBoxEnemy
            // 
            this.PictureBoxEnemy.BackColor = System.Drawing.Color.Transparent;
            this.PictureBoxEnemy.Location = new System.Drawing.Point(476, 65);
            this.PictureBoxEnemy.Name = "PictureBoxEnemy";
            this.PictureBoxEnemy.Size = new System.Drawing.Size(40, 40);
            this.PictureBoxEnemy.TabIndex = 9;
            this.PictureBoxEnemy.TabStop = false;
            // 
            // PictureBoxCharacter
            // 
            this.PictureBoxCharacter.BackColor = System.Drawing.Color.Transparent;
            this.PictureBoxCharacter.Location = new System.Drawing.Point(58, 56);
            this.PictureBoxCharacter.Name = "PictureBoxCharacter";
            this.PictureBoxCharacter.Size = new System.Drawing.Size(40, 40);
            this.PictureBoxCharacter.TabIndex = 7;
            this.PictureBoxCharacter.TabStop = false;
            // 
            // Level1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(878, 444);
            this.Controls.Add(this.PictureBoxEnemy2);
            this.Controls.Add(this.lblTimeRemaining);
            this.Controls.Add(this.lblHealth);
            this.Controls.Add(this.PictureBoxEnemy);
            this.Controls.Add(this.lblScore);
            this.Controls.Add(this.PictureBoxCharacter);
            this.Name = "Level1";
            this.Text = "Level1";
            this.Load += new System.EventHandler(this.Level1_Load);
            this.Paint += new System.Windows.Forms.PaintEventHandler(this.Level1_Paint);
            this.KeyDown += new System.Windows.Forms.KeyEventHandler(this.Level1_KeyDown);
            ((System.ComponentModel.ISupportInitialize)(this.PictureBoxEnemy2)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.PictureBoxEnemy)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.PictureBoxCharacter)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.PictureBox PictureBoxEnemy2;
        private System.Windows.Forms.Label lblTimeRemaining;
        private System.Windows.Forms.Label lblHealth;
        private System.Windows.Forms.PictureBox PictureBoxEnemy;
        private System.Windows.Forms.Label lblScore;
        private System.Windows.Forms.PictureBox PictureBoxCharacter;
    }
}