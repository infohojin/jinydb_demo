---
layout: board
javascript: "/public/assets/board.js"
---

# {{ data.title }}
---
작성일자 : {{ data.regdate }}


<form action="" method='POST' id='board'>
    <input type="hidden" name="_method">
    <input type="hidden" name="_id" value="{{data.id}}">
    <button type="button" class="btn btn-secondary" id='board_list'>글목록</button>
    <button type="butten" class="btn btn-danger" id='board_delete'>삭제</button>
    <button type="butten" class="btn btn-primary" id='board_edit'>수정</button>
</form>


