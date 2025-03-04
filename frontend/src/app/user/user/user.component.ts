import { Component } from '@angular/core';
import { NgFor, NgIf } from '@angular/common'; // Necessário para estruturar HTML
import { FormsModule } from '@angular/forms'; // IMPORTANTE: FormsModule precisa ser importado!
import { UserService } from '../../user.service';
import { Router} from '@angular/router';


@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css'],
  standalone: true,  // Componente Standalone
  imports: [FormsModule, NgFor, NgIf] // Aqui adicionamos o FormsModule
})
export class UserComponent {
  user = {
    name: '',
    email: '',
    password: ''
  };

  constructor(private userService: UserService, private router: Router) {}

  submitForm() {
    console.log('ta indo', this.user);
    this.userService.createUser(this.user).subscribe(
      (response) => {
        console.log('User created', response);
        this.router.navigate(['/']);
      },
      (error) => {
        console.error('There was an error!', error);
      }
    );
  }


}
