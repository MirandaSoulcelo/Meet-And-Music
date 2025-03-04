import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { AuthService } from '../service/auth.service';
import { FormsModule } from '@angular/forms'; // IMPORTANTE: FormsModule precisa ser importado!
import { NgFor, NgIf } from '@angular/common'; // Necessário para estruturar HTML
import { RouterOutlet, RouterModule } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  standalone: true,
  styleUrls: ['./app.component.css'],
  imports: [FormsModule, NgFor, NgIf, RouterOutlet, RouterModule] // Aqui adicionamos o FormsModule
})
export class AppComponent implements OnInit {
  data: any;
  isAuthenticated = false;

  user = {
    name: '',
    email: '',
    password: ''
  };

  constructor(private http: HttpClient, private authService: AuthService) {}

  ngOnInit() {
    // Verificar se o token existe e é válido
    const token = localStorage.getItem('token');
    this.isAuthenticated = !!token;

    if (this.isAuthenticated) {
      // Buscar os dados dos usuários caso autenticado
      this.http.get('http://127.0.0.1:8000/api')
        .subscribe(response => {
          this.data = response;
          console.log(this.data);
        });
    }
  }


}
