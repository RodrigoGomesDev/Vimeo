<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct(Video $video)
    {
        $this->Video = $video;
    }

    public function index() {
        $video = $this->Video->all();

        return response()->json($video);
    }

    public function show($id) {
        $video = $this->Video->find($id);

        return response()->json($video);
    }

    public function store(Request $request) {
        $create_video = $this->Video->create($request->all());
        return response()->json(["msg" => "O vídeo foi enviado com sucesso"]);
    }

    public function update($id, Request $request) {
        $video_update = $request->all();    
        $video = $this->Video->find($id);
        $video->update($video_update);
        return response()->json(['msg' => "O dados do vídeo foram atualizados com sucesso!"]);
    }

    public function delete($id) {
        $delete_video = $this->Video->destroy($id);
        return response()->json(["msg" => "O vídeo foi deletado com sucesso"]);
    }
}
