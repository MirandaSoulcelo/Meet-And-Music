import { Routes } from '@angular/router';

import { UserComponent } from '../app/user/user/user.component';
import { AppComponent } from './app.component';
import { UserListComponent } from './components/user-list/user-list.component';

export const routes: Routes = [
  { path: '', component: AppComponent }, // Página inicial
  { path: 'users', component: UserComponent }, // Página do formulário
  { path: 'users/list', component: UserListComponent }, // Rota para a lista de usuários
  { path: '**', redirectTo: '' } // Garantir que qualque
];


