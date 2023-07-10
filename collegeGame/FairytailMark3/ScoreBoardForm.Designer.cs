namespace FairytailMark3
{
    partial class ScoreBoardForm
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
            this.btnHome = new System.Windows.Forms.Button();
            this.lblHeadings = new System.Windows.Forms.Label();
            this.lblNames = new System.Windows.Forms.Label();
            this.lblScores = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // btnHome
            // 
            this.btnHome.BackgroundImage = global::FairytailMark3.Properties.Resources.backgroundFoButtons;
            this.btnHome.Font = new System.Drawing.Font("Monotype Corsiva", 15.75F, System.Drawing.FontStyle.Italic, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnHome.ForeColor = System.Drawing.Color.DarkRed;
            this.btnHome.Location = new System.Drawing.Point(35, 310);
            this.btnHome.Name = "btnHome";
            this.btnHome.Size = new System.Drawing.Size(155, 82);
            this.btnHome.TabIndex = 0;
            this.btnHome.Text = "Main Menu";
            this.btnHome.UseVisualStyleBackColor = true;
            this.btnHome.Click += new System.EventHandler(this.btnHome_Click_1);
            // 
            // lblHeadings
            // 
            this.lblHeadings.AutoSize = true;
            this.lblHeadings.Font = new System.Drawing.Font("Monotype Corsiva", 20.25F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblHeadings.ForeColor = System.Drawing.Color.DarkRed;
            this.lblHeadings.Image = global::FairytailMark3.Properties.Resources.backgroundFoButtons;
            this.lblHeadings.Location = new System.Drawing.Point(64, 43);
            this.lblHeadings.Margin = new System.Windows.Forms.Padding(2, 0, 2, 0);
            this.lblHeadings.Name = "lblHeadings";
            this.lblHeadings.Size = new System.Drawing.Size(290, 33);
            this.lblHeadings.TabIndex = 3;
            this.lblHeadings.Text = "Name                      Score ";
            // 
            // lblNames
            // 
            this.lblNames.AutoSize = true;
            this.lblNames.Font = new System.Drawing.Font("Century Gothic", 20F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblNames.ForeColor = System.Drawing.Color.White;
            this.lblNames.Location = new System.Drawing.Point(94, 76);
            this.lblNames.Margin = new System.Windows.Forms.Padding(2, 0, 2, 0);
            this.lblNames.Name = "lblNames";
            this.lblNames.Size = new System.Drawing.Size(0, 33);
            this.lblNames.TabIndex = 5;
            // 
            // lblScores
            // 
            this.lblScores.AutoSize = true;
            this.lblScores.Font = new System.Drawing.Font("Century Gothic", 20F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblScores.ForeColor = System.Drawing.Color.White;
            this.lblScores.Location = new System.Drawing.Point(305, 95);
            this.lblScores.Margin = new System.Windows.Forms.Padding(2, 0, 2, 0);
            this.lblScores.Name = "lblScores";
            this.lblScores.Size = new System.Drawing.Size(0, 33);
            this.lblScores.TabIndex = 4;
            // 
            // ScoreBoardForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackgroundImage = global::FairytailMark3.Properties.Resources.backgroundFoButtons;
            this.ClientSize = new System.Drawing.Size(546, 425);
            this.Controls.Add(this.lblNames);
            this.Controls.Add(this.lblScores);
            this.Controls.Add(this.lblHeadings);
            this.Controls.Add(this.btnHome);
            this.Name = "ScoreBoardForm";
            this.Text = "ScoreBoardForm";
            this.Load += new System.EventHandler(this.ScoreBoardForm_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button btnHome;
        private System.Windows.Forms.Label lblHeadings;
        private System.Windows.Forms.Label lblNames;
        private System.Windows.Forms.Label lblScores;
    }
}