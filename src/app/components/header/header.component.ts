import { Component, OnInit } from '@angular/core';
import { MatDialog, MatDialogConfig } from '@angular/material/dialog';
import { RegisterComponent } from '../register/register.component';
import { SigninComponent } from '../signin/signin.component';

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
    const dialogRef = this.dialog.open(SigninComponent);
  }
  openRegister() : void {
  
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
