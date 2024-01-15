<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Notifications\productNotification;

class NotificationsCotroller extends Controller
{
    /**
     * Obtenemos los usuarios con un rol dado
     */
    private function getUser($rol){
        return User::permission($rol)->get();
    }
    /**
     * Evento para crear notificacion de pedidos nuevos
     */
    public function notifyProductCreated($data)
    {
        /**
         * Obtenemos los correos de los usuarios con rol almacen
         */
        $users = $this->getUser('admin.create');
        Notification::send($users, new productNotification($data));
    }
}
