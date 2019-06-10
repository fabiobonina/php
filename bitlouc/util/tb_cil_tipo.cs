using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Bitlouc
{
    #region Tb_cil_tipo
    public class Tb_cil_tipo
    {
        #region Member Variables
        protected int _id;
        protected string _name;
        protected int _capacidade;
        protected string _tag;
        #endregion
        #region Constructors
        public Tb_cil_tipo() { }
        public Tb_cil_tipo(string name, int capacidade, string tag)
        {
            this._name=name;
            this._capacidade=capacidade;
            this._tag=tag;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual int Capacidade
        {
            get {return _capacidade;}
            set {_capacidade=value;}
        }
        public virtual string Tag
        {
            get {return _tag;}
            set {_tag=value;}
        }
        #endregion
    }
    #endregion
}