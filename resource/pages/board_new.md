---
layout: board
---

{% if data.title %}
# {{ data.title }}
{% else %}
# 글작성
{% endif %}

<form action="" method='post'>

  <div class="form-group">
    <label for="regdate">등록일자:</label>
    <input type="text" name='regdate' class="form-control" id="regdate">
  </div>

  <div class="form-group">
    <label for="title">제목:</label>
    <input type="text" name='title' class="form-control" id="title">
  </div>

  <button type="butten" class="btn btn-primary" id="board_add">저장</button>
</form>

