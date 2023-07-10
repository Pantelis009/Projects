namespace FairytailMark3
{
    partial class StartMenuForm
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(StartMenuForm));
            this.txtPlayersName = new System.Windows.Forms.TextBox();
            this.lblNatsuDragneel = new System.Windows.Forms.Label();
            this.btnStartGame = new System.Windows.Forms.Button();
            this.btnScoreBoard = new System.Windows.Forms.Button();
            this.btnRules = new System.Windows.Forms.Button();
            this.lblTitle = new System.Windows.Forms.Label();
            this.pictureBoxNATSU = new System.Windows.Forms.PictureBox();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxNATSU)).BeginInit();
            this.SuspendLayout();
            // 
            // txtPlayersName
            // 
            this.txtPlayersName.ForeColor = System.Drawing.SystemColors.ScrollBar;
            this.txtPlayersName.Location = new System.Drawing.Point(62, 349);
            this.txtPlayersName.Margin = new System.Windows.Forms.Padding(2);
            this.txtPlayersName.MaxLength = 10;
            this.txtPlayersName.Name = "txtPlayersName";
            this.txtPlayersName.Size = new System.Drawing.Size(227, 20);
            this.txtPlayersName.TabIndex = 29;
            this.txtPlayersName.Text = "Enter Name Here";
            this.txtPlayersName.MouseClick += new System.Windows.Forms.MouseEventHandler(this.txtPlayersName_MouseClick);
            this.txtPlayersName.TextChanged += new System.EventHandler(this.txtPlayerName_TextChanged);
            this.txtPlayersName.Enter += new System.EventHandler(this.txtPlayersName_Enter);
            this.txtPlayersName.KeyDown += new System.Windows.Forms.KeyEventHandler(this.txtPlayersName_KeyDown);
            // 
            // lblNatsuDragneel
            // 
            this.lblNatsuDragneel.AutoSize = true;
            this.lblNatsuDragneel.BackColor = System.Drawing.Color.Transparent;
            this.lblNatsuDragneel.Font = new System.Drawing.Font("Monotype Corsiva", 20.25F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblNatsuDragneel.ForeColor = System.Drawing.Color.DarkRed;
            this.lblNatsuDragneel.Location = new System.Drawing.Point(86, 314);
            this.lblNatsuDragneel.Margin = new System.Windows.Forms.Padding(2, 0, 2, 0);
            this.lblNatsuDragneel.Name = "lblNatsuDragneel";
            this.lblNatsuDragneel.Size = new System.Drawing.Size(180, 33);
            this.lblNatsuDragneel.TabIndex = 28;
            this.lblNatsuDragneel.Text = "Natsu Dragneel";
            // 
            // btnStartGame
            // 
            this.btnStartGame.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("btnStartGame.BackgroundImage")));
            this.btnStartGame.Font = new System.Drawing.Font("Monotype Corsiva", 20.25F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnStartGame.ForeColor = System.Drawing.Color.DarkRed;
            this.btnStartGame.Location = new System.Drawing.Point(11, 373);
            this.btnStartGame.Margin = new System.Windows.Forms.Padding(2);
            this.btnStartGame.Name = "btnStartGame";
            this.btnStartGame.Size = new System.Drawing.Size(160, 52);
            this.btnStartGame.TabIndex = 23;
            this.btnStartGame.Text = "Start";
            this.btnStartGame.UseVisualStyleBackColor = true;
            this.btnStartGame.Click += new System.EventHandler(this.btnStartGame_Click);
            // 
            // btnScoreBoard
            // 
            this.btnScoreBoard.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("btnScoreBoard.BackgroundImage")));
            this.btnScoreBoard.Font = new System.Drawing.Font("Monotype Corsiva", 20.25F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnScoreBoard.ForeColor = System.Drawing.Color.DarkRed;
            this.btnScoreBoard.Location = new System.Drawing.Point(175, 373);
            this.btnScoreBoard.Margin = new System.Windows.Forms.Padding(2);
            this.btnScoreBoard.Name = "btnScoreBoard";
            this.btnScoreBoard.Size = new System.Drawing.Size(147, 52);
            this.btnScoreBoard.TabIndex = 22;
            this.btnScoreBoard.Text = "Score Board";
            this.btnScoreBoard.UseVisualStyleBackColor = true;
            this.btnScoreBoard.Click += new System.EventHandler(this.btnScoreBoard_Click);
            // 
            // btnRules
            // 
            this.btnRules.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("btnRules.BackgroundImage")));
            this.btnRules.Font = new System.Drawing.Font("Monotype Corsiva", 20.25F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnRules.ForeColor = System.Drawing.Color.DarkRed;
            this.btnRules.Location = new System.Drawing.Point(326, 373);
            this.btnRules.Margin = new System.Windows.Forms.Padding(2);
            this.btnRules.Name = "btnRules";
            this.btnRules.Size = new System.Drawing.Size(96, 52);
            this.btnRules.TabIndex = 21;
            this.btnRules.Text = "Rules";
            this.btnRules.UseVisualStyleBackColor = true;
            this.btnRules.Click += new System.EventHandler(this.btnRules_Click);
            // 
            // lblTitle
            // 
            this.lblTitle.AutoSize = true;
            this.lblTitle.BackColor = System.Drawing.Color.Transparent;
            this.lblTitle.Font = new System.Drawing.Font("Monotype Corsiva", 24F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblTitle.ForeColor = System.Drawing.Color.Red;
            this.lblTitle.Location = new System.Drawing.Point(178, 36);
            this.lblTitle.Margin = new System.Windows.Forms.Padding(2, 0, 2, 0);
            this.lblTitle.Name = "lblTitle";
            this.lblTitle.Size = new System.Drawing.Size(290, 39);
            this.lblTitle.TabIndex = 20;
            this.lblTitle.Text = "Welcome To FairyTail";
            // 
            // pictureBoxNATSU
            // 
            this.pictureBoxNATSU.Image = global::FairytailMark3.Properties.Resources.natsu;
            this.pictureBoxNATSU.InitialImage = ((System.Drawing.Image)(resources.GetObject("pictureBoxNATSU.InitialImage")));
            this.pictureBoxNATSU.Location = new System.Drawing.Point(113, 180);
            this.pictureBoxNATSU.Name = "pictureBoxNATSU";
            this.pictureBoxNATSU.Size = new System.Drawing.Size(126, 131);
            this.pictureBoxNATSU.TabIndex = 31;
            this.pictureBoxNATSU.TabStop = false;
            this.pictureBoxNATSU.Click += new System.EventHandler(this.pictureBoxNATSU_Click_1);
            // 
            // StartMenuForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackgroundImage = global::FairytailMark3.Properties.Resources.rsz_untitled;
            this.ClientSize = new System.Drawing.Size(837, 459);
            this.Controls.Add(this.pictureBoxNATSU);
            this.Controls.Add(this.txtPlayersName);
            this.Controls.Add(this.lblNatsuDragneel);
            this.Controls.Add(this.btnStartGame);
            this.Controls.Add(this.btnScoreBoard);
            this.Controls.Add(this.btnRules);
            this.Controls.Add(this.lblTitle);
            this.DoubleBuffered = true;
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.Name = "StartMenuForm";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Main Menu";
            this.FormClosed += new System.Windows.Forms.FormClosedEventHandler(this.StartMenuForm_FormClosed);
            this.Load += new System.EventHandler(this.StartMenuForm_Load);
            this.Paint += new System.Windows.Forms.PaintEventHandler(this.StartMenuForm_Paint);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxNATSU)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion
        private System.Windows.Forms.TextBox txtPlayersName;
        private System.Windows.Forms.Label lblNatsuDragneel;
        private System.Windows.Forms.Button btnStartGame;
        private System.Windows.Forms.Button btnScoreBoard;
        private System.Windows.Forms.Button btnRules;
        private System.Windows.Forms.Label lblTitle;
        private System.Windows.Forms.PictureBox pictureBoxNATSU;
    }
}