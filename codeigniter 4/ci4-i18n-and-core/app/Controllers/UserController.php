<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Events\Events;

class UserController extends BaseController
{
    public function index()
    {
        // Events::trigger('user_login', $user);

        return view('users/index');
    }

    // $userService = service('userService');

    // if (! $userService->canDeleteUser($currentUser, $targetUser)) {
    //     throw new \CodeIgniter\Exceptions\PageForbiddenException();
    // }
    public function delete($id)
    {
        $model = new UserModel();

        $user = $model->find($id);

        if (! $user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        $model->delete($id);

        // Disparamos el evento
        Events::trigger('user_deleted', $user);

        return redirect()->to('/users')
            ->with('message', 'Usuario eliminado');
    }
}
