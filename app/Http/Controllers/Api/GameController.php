<?php

namespace app\Http\Controllers\Api;
use app\Game;
use app\Transformer\GameTransformer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use app\User;

class GameController extends ApiController
{
    public function index(){
        $games = Game::limitToUser($this->currentUser);
        if (!$games) {
            return $this->errorNotFound('Game not found');
        }
        return $this->respondWithCollection($games->get(), new GameTransformer());
    }

    public function show($id){
        $game = Game::limitToUser($this->currentUser)->where('id',$id);
        if (!$game) {
            return $this->errorNotFound('Game not found');
        }
        return $this->respondWithCollection($game->get(), new GameTransformer());
    }

    public function update($id){

        if (!$this->currentUser->isSiteAdmin()){
            return $this->errorUnauthorized();
        }

        $game = Game::find($id);

        if (!$game) {
            return $this->errorNotFound('Game not found');
        }

        if (!$game->canUpdate($this->currentUser)) {
            return $this->errorUnauthorized();
        }

        $validator = Validator::make(Input::all(), Game::$gameUpdateRules);
        if (!$validator->passes()) {
            return $this->errorWrongArgs($validator->errors()->all());
        }

        $game->updateParameters(Input::all());
        return $this->respondWithArray(array('message' => 'The game has been updated successfully.'));

    }
    public function delete($id){
        $game = Game::find($id);

        if (!$game) {
            return $this->errorNotFound('Game not found');
        }

        if (!$game->canUpdate($this->currentUser)) {
            return $this->errorUnauthorized();
        }

        $game->delete();
        return $this->respondWithArray(array('message' => 'The game has been deleted successfully.'));
    }
}
