<?php

/*
 * Copyright (c) 2011 Toni Spets <toni.spets@iki.fi>
 *
 * Permission to use, copy, modify, and distribute this software for any
 * purpose with or without fee is hereby granted, provided that the above
 * copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
 * WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR
 * ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
 * WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN
 * ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF
 * OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
 */

class IndexController extends CnCNet_Controller_Action
{
    public function indexAction()
    {
        $this->render('index');
    }

    public function initAction()
    {
        /* handle some JS routing here, this may be a bit wrong */

        if (isset($this->session->room_id) && $this->session->room_id == -1) {
            return $this->_forward('index', 'game');
        }

        if (isset($this->session->room_id) && $this->session->room_id > 0) {
            return $this->_forward('index', 'room');
        }

        if (isset($this->session->player_id)) {
            return $this->_forward('index', 'rooms');
        }

        return $this->_forward('index', 'player');
    }
}
