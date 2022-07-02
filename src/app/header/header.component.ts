import { Component, NgModule, OnInit } from '@angular/core';
import { MatDialog, MatDialogRef, MatDialogConfig } from '@angular/material/dialog';
import { AngularMaterialModule } from '../angular-material-module';
import { MatButtonModule } from '@angular/material/button';
import { SigninComponent } from '../components/signin/signin.component';
import { RegisterComponent } from '../components/register/register.component';
import { faLinkedin } from '@fortawesome/free-brands-svg-icons';
import { faGit } from '@fortawesome/free-brands-svg-icons';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css'],
  
})

export class HeaderComponent implements OnInit {

  constructor( private dialog : MatDialog ) { }

  openLogindialog(): void {
    
    /* const dialogConfig = new MatDialogConfig();

    dialogConfig.disableClose = false;
    dialogConfig.autoFocus = true; */
    const dialogRef = this.dialog.open(SigninComponent, {
        height: '400px',
        width: '600px',
      });
  }
  openRegister() {
  
    const dialogConfig = new MatDialogConfig();

    dialogConfig.disableClose = false;
    dialogConfig.autoFocus = true;
  
   let registerdialog = this.dialog.open(RegisterComponent, dialogConfig);
    registerdialog.afterClosed().subscribe( result => {
      if (result){
       /* succes */ 
      }
    })
  }

 
  ngOnInit(): void {
  }

}
