using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Bitlouc
{
    #region Tb_cil_prog_item
    public class Tb_cil_prog_item
    {
        #region Member Variables
        protected int _id;
        protected int _programacao_id;
        protected int _cilindro_id;
        protected int _demanda_id;
        #endregion
        #region Constructors
        public Tb_cil_prog_item() { }
        public Tb_cil_prog_item(int programacao_id, int cilindro_id, int demanda_id)
        {
            this._programacao_id=programacao_id;
            this._cilindro_id=cilindro_id;
            this._demanda_id=demanda_id;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual int Programacao_id
        {
            get {return _programacao_id;}
            set {_programacao_id=value;}
        }
        public virtual int Cilindro_id
        {
            get {return _cilindro_id;}
            set {_cilindro_id=value;}
        }
        public virtual int Demanda_id
        {
            get {return _demanda_id;}
            set {_demanda_id=value;}
        }
        #endregion
    }
    #endregion
}